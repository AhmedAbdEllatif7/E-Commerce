<?php

namespace App\Providers;

use App\Payment\PaymentInterface;
use App\Payment\PayPal;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(PaymentInterface::class, PayPal::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
