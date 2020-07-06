<?php

namespace App\Interfaces;

interface PaymentGatewayInterface
{
    public function setDiscount($amount);

    public function charge($amount);
}