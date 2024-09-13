<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el API
Route::prefix('api')->group(function () {
    require base_path('routes/api/api.php');
});
