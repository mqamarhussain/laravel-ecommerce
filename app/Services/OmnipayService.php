<?php

namespace App\Services;

use App\Models\PaymentMethod;
use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Omnipay;

class OmnipayService
{
    protected $gateway = '';

    public function __construct(string $paymentMethod = 'PayPal_Express')
    {
        $config = PaymentMethod::where('driver_name', $paymentMethod)->first();

        // dd($config);
        if (is_null($paymentMethod) || $paymentMethod == 'PayPal_Express') {
            $this->gateway = Omnipay::create('PayPal_Express');

            if ($config->sandbox) {
                $this->gateway->setUsername($config->sb_username);
                $this->gateway->setPassword($config->sb_user_password);
                $this->gateway->setSignature($config->sb_signature);
                $this->gateway->setTestMode('sandbox');
            }else{
                $this->gateway->setUsername($config->username);
                $this->gateway->setPassword($config->user_password);
                $this->gateway->setSignature($config->signature);
                $this->gateway->setTestMode('live');
            }
        }
        return $this->gateway;
    }

    public function purchase(array $params): ResponseInterface
    {
        return $this->gateway->purchase($params)->send();
    }

    public function refund(array $params): ResponseInterface
    {
        return $this->gateway->refund($params)->send();
    }

    public function complete(array $params):ResponseInterface
    {
        return $this->gateway->completePurchase($params)->send();
    }

    public function getCancelUrl($orderId): string
    {
        return route('payment.cancelled', $orderId);
    }

    public function getReturnUrl($orderId): string
    {
        return route('payment.completed', $orderId);
    }

    public function getNotifyUrl($orderId): string
    {
        $env = config('services.paypal.sandbox') ? 'sandbox' : 'live';
        return route('payment.webhook.ipn', [$orderId, $env]);
    }
}
