<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Stripe::setApiKey('sk_test_Jt0XAa7badGwoBCl1HCjpSkj');
        //User::setStripeKey('sk_test_Jt0XAa7badGwoBCl1HCjpSkj');
    }
}
