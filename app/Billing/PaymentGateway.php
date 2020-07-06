<?php


namespace App\Billing;

class PaymentGateway
{
    public function setPayment()
    {
        if (request()->has('paypal')) {
            return new PaypalPaymentGateway('usd');
        } elseif (request()->has('credit')) {
            return new CreditPaymentGateway('usd');
        } else {
            return new StripePaymentGateway('usd');
        }
    }
}
