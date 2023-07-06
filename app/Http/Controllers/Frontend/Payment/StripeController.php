<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\PaymentMethod;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use App\Services\OrderService;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    private $stripe;
    private $config;
    public function __construct()
    {
        $this->config = PaymentMethod::where('driver_name', 'stripe')->first();
        $client_secret = $this->config->sandbox ? $this->config->sandbox_client_secret : $this->config->client_secret;
        $this->stripe = new StripeClient($client_secret);
    }

    public function index(Request $request)
    {
        $userAddressId = $request->userAddressId;
        $shippingCompanyId = $request->shippingCompanyId;
        $paymentMethodId = $request->paymentMethodId;
        $totalAmount = $request->total_amount;

        return view('corano-dark.frontend.payment.stripe.index', compact('userAddressId', 'shippingCompanyId', 'paymentMethodId', 'totalAmount'));
    }

    public function payment(Request $request)
    {
        $order = (new OrderService())->createOrder($request->except(['_token', 'submit']));
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required'
        ]);
        // dd($validator->errors());
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors()->first());
            return response()->redirectTo('/checkout');
        }

        $token = $this->createToken($request);
        // dd($token);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->redirectTo('/checkout');
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/checkout');
        }

        $charge = $this->createCharge($token['id'], $order);
        // dd($charge);
        if (!empty($charge) && $charge['status'] == 'succeeded') {  // success
            return $this->completed($order, $charge);
        } else { // failure
            return $this->cancelled($order);
        }
        $request->session()->flash('danger', "Something went wrong with your order");
        return response()->redirectTo('/checkout');
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $order)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $order->total,
                'currency' => $order->currency,
                'source' => $tokenId,
                'description' => $order->ref_id
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }

    private function cancelled($order): RedirectResponse
    {

        $order->update([
            'order_status' => Order::CANCELED
        ]);
        $order->products()->each(function ($orderProduct) {
            $product = Product::whereId($orderProduct->pivot->product_id)->first();
            $product->update([
                'quantity' => $product->quantity + $orderProduct->pivot->quantity
            ]);
        });

        toast('Your order payment was failed!', 'error');
        return redirect()->route('home');
    }

    private function completed($order, $charge)
    {
        $order->update(['order_status' => Order::PAID]);
        $order->transactions()->create([
            'transaction_status' => OrderTransaction::PAID,
            'transaction_number' => $charge->id,
            'payment_result' => 'success'
        ]);

        if (session()->has('coupon')) {
            $coupon = Coupon::whereCode(session()->get('coupon')['code'])->first();
            $coupon->increment('used_times');
        }

        Cart::instance('default')->destroy();

        session()->forget([
            'coupon',
            'saved_user_address_id',
            'saved_shipping_company_id',
            'saved_payment_method_id',
            'shipping'
        ]);

        // Notification to admins.
        // User::role(['admin', 'supervisor'])->each(function ($admin, $key) use ($order) {
        //     $admin->notify(new OrderCreatedNotification($order));
        // });

        // Send email with PDF invoice
        // $data = $order->toArray();
        // $data['currency_symbol'] = $order->currency == 'USD' ? '$' : $order->currency;
        // $pdf = PDF::loadView('layouts.invoice', $data);
        // $saved_file = storage_path('app/pdf/files/' . $data['ref_id'] . '.pdf');
        // $pdf->save($saved_file);

        // $user = User::find($order->user_id);
        // $user->notify(new OrderThanksNotification($order, $saved_file));

        toast('Payment made successfully', 'success');
        return redirect()->route('user.orders');
    }
}
