<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GuestsController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/guests', [GuestsController::class, 'index']);
Route::post('/guests', [GuestsController::class, 'store']);
Route::get('/guests/{id}', [GuestsController::class, 'show']);
Route::get('/guests/{id}/edit', [GuestsController::class, 'edit']);
Route::put('/guests/{id}/edit', [GuestsController::class, 'update']);
Route::delete('/guests/{id}/delete', [GuestsController::class, 'destroy']);
