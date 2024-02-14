<?php

namespace App\Providers;

use App\Services\AuthHelperService;
use Illuminate\Support\ServiceProvider;

class AuthHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $configuration = config('grades.list');

        $this->app->bind(
            abstract: AuthHelperService::class,
            concrete: fn ($app) => new AuthHelperService(is_array($configuration) ? $configuration : [])
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
