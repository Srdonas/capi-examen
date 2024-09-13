<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DireccionController;

Route::get('/contactos/{contactoId}/direcciones', [DireccionController::class, 'index']);
Route::post('/contactos/{contactoId}/direcciones', [DireccionController::class, 'store']);
Route::put('/direcciones/{id}', [DireccionController::class, 'update']);
Route::delete('/direcciones/{id}', [DireccionController::class, 'destroy']);
