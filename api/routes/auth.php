<?php

use App\Http\Controllers\CashbackController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| AUTH Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Auth routes for your application. These
| routes are loaded in the api.php routes files and all of them will
| be assigned to the "api" middleware group.
|
*/

$limiter = config('fortify.limiters.login');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest:'.Config::get('fortify.guard'));

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth:sanctum')
    ->prefix('auth')
    ->group(static function (): void {

        Route::get('/me', [UserController::class, 'show']);

        Route::get('/cashback', [CashbackController::class, 'show']);

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
