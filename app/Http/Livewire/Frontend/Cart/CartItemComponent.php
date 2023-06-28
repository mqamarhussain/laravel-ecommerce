<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Product;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartItemComponent extends Component
{
    use LivewireAlert;

    public $item;
    public $itemQuantity = 1;

    public $cartSubTotal;
    public $cartTotal;
    public $cartTax;
    public $cartDiscount;
    public $cartShipping;
    public $couponCode;


    protected $listeners = [
        'update_cart' => 'mount'
    ];

    public function mount()
    {
        $this->refreshCart();
    }

    public function refreshCart()
    {
        $this->cartSubTotal = getNumbersOfCart()->get('subtotal');
        $this->cartTotal = getNumbersOfCart()->get('total');
        $this->cartTax = getNumbersOfCart()->get('productTaxes');
        $this->cartDiscount = getNumbersOfCart()->get('discount');
        $this->couponCode = getNumbersOfCart()->get('discountCode');
        $this->cartShipping = getNumbersOfCart()->get('shipping');
    }


    public function applyDiscount()
    {
        if (!getNumbersOfCart()) {
            $this->couponCode = '';
            $this->alert('error', 'No products available in your cart');
        }
        $coupon = Coupon::whereCode($this->couponCode)->whereStatus(true)->first();
        if (!$coupon) {
            $this->couponCode = '';
            $this->alert('error', 'Coupon is invalid');
            return;
        }

        if ($coupon->greater_than > getNumbersOfCart()->get('subtotal')) {
            $this->couponCode = '';
            $this->alert('warning', 'Subtotal must greater than ' . currency_format($coupon->greater_than));
            return;
        }

        $couponValue = $coupon->type == 'fixed' ? $coupon->value : $this->cartSubTotal * $coupon->value / 100;

        if ($couponValue < 0) {
            $this->alert('error', 'product coupon is invalid');
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'value' => $coupon->value,
            'discount' => $couponValue
        ]);

        $this->couponCode = session()->get('coupon')['code'];
        $this->emit('update_cart');
        $this->alert('success', 'Coupon is applied successfully');
        return;
    }

    public function removeCoupon()
    {
        session()->remove('coupon');
        $this->couponCode = '';
        $this->emit('update_cart');
        $this->alert('success', 'remove coupon successfully');
    }

    public function decreaseQuantity($rowId)
    {
        if ($this->itemQuantity > 1) {
            $this->itemQuantity -= 1;
            Cart::instance('default')->update($rowId, $this->itemQuantity);
            if (session()->has('coupon')) {
                $this->alert('info', 'Add your coupon again');
            }
            $this->clearSession();
            $this->emit('update_cart');
        }
    }

    public function increaseQuantity($rowId, $id)
    {


        $productQuantity = Product::whereId($id)->pluck('quantity')->first();

        if ($productQuantity > $this->itemQuantity && $this->itemQuantity > 0) {
            $this->itemQuantity += 1;
            Cart::instance('default')->update($rowId, $this->itemQuantity);
            if (session()->has('coupon')) {
                $this->alert('info', 'Add your coupon again');
            }
            $this->clearSession();
            $this->emit('update_cart');
        } else {
            $this->alert('warning', 'maximum quantity ' . $productQuantity);
        }
    }

    public function removeFromCart($rowId)
    {
        $this->clearSession();
        Cart::instance('default')->remove($rowId);
        $this->emit('update_cart');
        $this->alert('success', 'Item removed from cart!');
    }

    protected function clearSession()
    {
        session()->forget('coupon');
        session()->forget('shipping');
        session()->forget('saved_user_address_id');
        session()->forget('saved_shipping_company_id');
        session()->forget('saved_payment_method_id');
    }

    public function render()
    {

        return view('livewire.frontend.cart.cart-item-component');
    }
}
