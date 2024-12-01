<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('objetivos', App\Http\Controllers\ObjetivoController::class, []);
    
});
