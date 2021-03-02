<?php

namespace App\Providers;

use App\Helper\Billing\PaymentGatewayContract;
use App\Helper\Billing\BankPaymentGateway;
use App\Helper\Billing\CreditPaymentGateway;
use App\Http\View\Composer\ChannelComposer;
use App\Models\Channel;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            return request()->has('credit') ?   new CreditPaymentGateway('usd') : new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        # option-1 for every single view
        # View::share('channels', Channel::orderBy('name')->get());

        # option-2 spacefic view with
        #     View::composer(['post.*','channel.index'],function ($view){
        #        $view->with('channels', Channel::orderBy('name')->get());
        #    });

        # dedicate Class
        #  View::composer(['post.*', 'channel.index'], ChannelComposer::class);

        View::composer('partial.channel.*', ChannelComposer::class);
    }
}
