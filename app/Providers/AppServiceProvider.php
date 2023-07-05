<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();


        Validator::extend('validate_discount', function ($attribute, $value, $parameters, $validator) {
            $discount_type = $validator->getData()['discount_type'];
            $price = $validator->getData()['price'];

            if ($discount_type == 'percent' && $value >= 100) {
                return false;
            }

            if ($discount_type == 'fixed' && $value >= $price) {
                return false;
            }

            return true;
        });


        view()->share('theme', active_theme());
    }
}
