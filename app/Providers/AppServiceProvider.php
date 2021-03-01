<?php

namespace App\Providers;

use App\Helper\Billing\PaymentGatewayContract;
use App\Helper\Billing\BankPaymentGateway;
use App\Helper\Billing\CreditPaymentGateway;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function($app){
         return request()->has('credit') ?   new CreditPaymentGateway('usd'): new BankPaymentGateway('usd');;
                       
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
