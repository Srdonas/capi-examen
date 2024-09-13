<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/contactos/{contactoId}/emails', [EmailController::class, 'index']);
Route::post('/contactos/{contactoId}/emails', [EmailController::class, 'store']);
Route::put('/emails/{id}', [EmailController::class, 'update']);
Route::delete('/emails/{id}', [EmailController::class, 'destroy']);
