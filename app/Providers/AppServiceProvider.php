<?php

namespace App\Providers;

use App\Billing\CreditPaymentGateway;
use App\Billing\PaypalPaymentGateway;
use App\Billing\StripePaymentGateway;
use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(PaymentGatewayInterface::class, function ($app) {
            if(request()->has('paypal')){
                return new PaypalPaymentGateway('usd');
            } elseif (request()->has('credit')){
                return new CreditPaymentGateway('usd');
            } else {
                return new StripePaymentGateway('usd');
            }
        });
    }


    public function boot()
    {
        //
    }
}
