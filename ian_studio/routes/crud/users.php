<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class, []);
    Route::post('store-or-update-historic-student/{student}',[UserController::class,'storeHistoricoAluno'])->name('users.storeOrUpdateHitoricoAluno');

    Route::post('store-or-update-habito-student/{student}',[UserController::class,'storeHabitoAluno'])->name('users.storeOrUpdateHabitosAluno');

    Route::post('store-or-update-avaliacao_corporal-student/{student}',[UserController::class,'storeAvaliacaoCorporal'])->name('users.storeOrUpdateAvaliacaoCorporalAluno');

    Route::post('store-or-update-questionario_mulheres-student/{student}',[UserController::class,'storeQuestionarioFeminino'])->name('users.storeOrUpdateQuestionarioFemininoAluno');

    Route::post('store-or-update-objetivos-student/{student}',[UserController::class,'storeObjetivos'])->name('users.storeOrUpdateObjetivosAluno');

    Route::post('store-or-update-trainnings-student/{student}',[UserController::class,'storeTrainnings'])->name('users.storeOrUpdateTrainnings');

    Route::post('store-or-planos-student/{student}',[UserController::class,'storePlan'])->name('users.storeOrUpdatePlan');

    Route::post('store-or-payment_plan-student/{student}',[UserController::class,'pagamentoDeMensalidadeAluno'])->name('users.paymentPlan');
});
