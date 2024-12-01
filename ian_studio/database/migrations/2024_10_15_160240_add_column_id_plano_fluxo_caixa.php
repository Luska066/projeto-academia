<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fluxo_caixa', function (Blueprint $table) {
//            $table->unsignedBigInteger('id_plano')->nullable();
            $table->index(["id_plano"], 'fk_users_7_idx');
            $table->foreign('id_plano')->references('id')->on('planos_valores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
