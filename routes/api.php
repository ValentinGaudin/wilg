<?php

use App\Http\Controllers\Grades\GradeDetailController;
use App\Http\Controllers\Grades\GradeIndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/grades', GradeIndexController::class);
Route::get('/grades/{grade}', GradeDetailController::class);

Route::middleware('auth:sanctum')
    ->group(static function (): void {

        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
