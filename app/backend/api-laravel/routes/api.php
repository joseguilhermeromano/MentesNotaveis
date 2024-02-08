<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;

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

Route::get('/', function () {
    return response()->json([
        'success' => 'Welcome to API Laravel - MentesNotáveis'
    ]);
});

Route::get('/address', [AddressController::class, 'index']);
Route::get('/address/{id}', [AddressController::class, 'show']);
Route::post('/address', [AddressController::class, 'store']);
Route::put('/address/{id}', [AddressController::class, 'update']);
Route::delete('/address/{id}', [AddressController::class, 'destroy']);

Route::get('/city', [CityController::class, 'index']);
Route::get('/city/{id}', [CityController::class, 'show']);
Route::get('/state', [StateController::class, 'index']);
Route::get('/state/{id}', [StateController::class, 'show']);
