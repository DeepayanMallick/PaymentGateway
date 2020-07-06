<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(PaymentGatewayInterface::class, function ($app) {
            $paymentGateway =  new PaymentGateway();
            return $paymentGateway->setPayment();
        });
    }


    public function boot()
    {
        //
    }
}
