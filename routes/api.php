<?php

use Illuminate\Http\Request;
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

Route::get('/people', [PeopleController::class, 'index']);
Route::get('/people/{id}', [PeopleController::class, 'show']);
Route::post('/people', [PeopleController::class, 'store']);
Route::delete('/people/{id}', [PeopleController::class, 'destroy']);

Route::get('/carros', [CarroController::class, 'index']);
Route::get('/carros/{id}', [CarroController::class, 'show']);
Route::post('/carros', [CarroController::class, 'store']);
Route::put('/carros/{id}', [CarroController::class, 'update']);
Route::delete('/carros/{id}', [CarroController::class, 'destroy']);

Route::get('/marcas', [MarcaController::class, 'index']);
