<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('license_plate', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Z]{2} \d{4}$/', $value) === 1;
        });
    }
}
