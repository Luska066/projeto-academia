<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('planos', App\Http\Controllers\PlanoController::class, []);
    
});
