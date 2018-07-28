<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\GpioControl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GpioControl::class, function($app) {
            return new GpioControl;
        });
    }
}
