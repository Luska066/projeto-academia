<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('exercicios', App\Http\Controllers\ExercicioController::class, []);
    
});
