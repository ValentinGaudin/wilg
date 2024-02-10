<?php

namespace App\Providers;

use App\Helpers\AuthHelper;
use Illuminate\Support\ServiceProvider;

class AuthHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('AuthHelper', function () {
            return new AuthHelper;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
