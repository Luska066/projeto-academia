<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('planos_valor', App\Http\Controllers\PlanosValorController::class, []);
    
});
