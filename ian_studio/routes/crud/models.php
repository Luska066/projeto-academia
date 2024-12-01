<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('models', App\Http\Controllers\ModelController::class, []);
    
});
