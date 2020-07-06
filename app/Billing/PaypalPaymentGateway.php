<?php

namespace App\Billing;

use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Support\Str;

class PaypalPaymentGateway implements PaymentGatewayInterface
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }


    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function charge($amount)
    {
        return [
            'amount' => $amount - $this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'type' => 'Paypal',
        ];
    }
}