<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelefonoController;

Route::get('/contactos/{contactoId}/telefonos', [TelefonoController::class, 'index']);
Route::post('/contactos/{contactoId}/telefonos', [TelefonoController::class, 'store']);
Route::put('/telefonos/{id}', [TelefonoController::class, 'update']);
Route::delete('/telefonos/{id}', [TelefonoController::class, 'destroy']);
