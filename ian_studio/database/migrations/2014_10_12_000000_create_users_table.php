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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('id_objetivo')->nullable();
            $table->integer('id_habitos')->nullable();
            $table->integer('id_historico')->nullable();
            $table->integer('id_avaliacao_corporal')->nullable();
            $table->integer('id_questionario_mulheres')->nullable();
            $table->string('nome')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->integer('idade')->nullable();
            $table->string('sexo')->nullable();
            $table->string('celular')->nullable();
            $table->string('cep', 45)->nullable();
            $table->string('endereco')->nullable();
            $table->string('estado', 45)->nullable();
            $table->string('bairro')->nullable();
            $table->string('contato_emergencia')->nullable();
            $table->index(["id_habitos"], 'fk_users_1_idx');

            $table->index(["id_objetivo"], 'fk_users_2_idx');

            $table->index(["id_questionario_mulheres"], 'fk_users_3_idx');

            $table->index(["id_historico"], 'fk_users_4_idx');

            $table->index(["id_avaliacao_corporal"], 'fk_users_5_idx');


            $table->foreign('id_habitos')
                ->references('id')->on('habitos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_objetivo')
                ->references('id')->on('objetivos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_questionario_mulheres')
                ->references('id')->on('questionarios_mulheres')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_historico')
                ->references('id')->on('historicos_alunos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_avaliacao_corporal')
                ->references('id')->on('avaliacoes_corporais')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
