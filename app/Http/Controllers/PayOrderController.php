<?php

namespace App\Http\Controllers;
use App\Interfaces\PaymentGatewayInterface;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayInterface $paymentGateway)
    {
        $order = $orderDetails->all();

        dd($paymentGateway->charge(5000));
    }
}
