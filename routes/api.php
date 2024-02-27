<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/guests', function() {
    return 'This is Guest API';
});


// Route::get('/guests', 'guests@index');
// Route::get('/products/{id}', 'ProductController@show');
// Route::post('/products', 'ProductController@store');
// Route::put('/products/{id}', 'ProductController@update');
// Route::delete('/products/{id}', 'ProductController@destroy');
