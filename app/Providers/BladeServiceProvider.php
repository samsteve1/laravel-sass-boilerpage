<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      Blade::if('impersonating', function () {
        return session()->has('impersonate');
      });

      Blade::if('admin', function () {
        return auth()->user()->hasRole('admin');
      });

        Blade::if('subscribed', function () {
          return auth()->user()->hasSubscription();
        });

        Blade::if('notSubscribed', function () {
          return !auth()->check() || auth()->user()->doesNotHaveSubscription();
        });

        Blade::if('subscriptionCancelled', function () {
          return auth()->user()->hasCancelled();
        });

        Blade::if('subscriptionNotCancelled', function () {
          return auth()->user()->hasNotCancelled();
        });

        Blade::if('teamsubscription', function () {
          return auth()->user()->hasTeamSubscription();
        });

        Blade::if('notpiggybacksubscription', function() {
          return !auth()->user()->hasPiggybackSubscription();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
