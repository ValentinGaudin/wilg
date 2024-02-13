<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        Model::shouldBeStrict(! $this->app->isProduction());

        Validator::extend('plan_in_array', function ($attribute, $value, $parameters, $validator) {
            return in_array($value, $parameters);
        }, 'The :attribute must be one of :values.');

        Validator::extend('token_between_values', function ($attribute, $value, $parameters, $validator) {
            return $value >= trim($parameters[0]) && $value < trim($parameters[1]);
        });
    }
}
