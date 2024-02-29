<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GuestsController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/guests', [GuestsController::class, 'index']);
Route::post('/guests', [GuestsController::class, 'store']);


// Route::get('/products/{id}', 'ProductController@show');
// Route::post('/products', 'ProductController@store');
// Route::put('/products/{id}', 'ProductController@update');
// Route::delete('/products/{id}', 'ProductController@destroy');
