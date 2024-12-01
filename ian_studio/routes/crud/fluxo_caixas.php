<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('fluxo_caixa', App\Http\Controllers\FluxoCaixaController::class, []);
    
});
