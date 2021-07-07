<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\MarcaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('apiJWT')->group(function() {
    Route::prefix('auth')->group(function () {
        Route::post('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    Route::prefix('carros')->group(function () {
        Route::get('', [CarroController::class, 'index']);
        Route::get('{id}', [CarroController::class, 'show']);
        Route::post('', [CarroController::class, 'store']);
        Route::put('{id}', [CarroController::class, 'update']);
        Route::delete('{id}', [CarroController::class, 'destroy']);
    });

    Route::get('/marcas', [MarcaController::class, 'index']);
});
