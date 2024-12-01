
<?php
        /**
     *namespace Database\Migrations;
     */


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
        /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('habitos');
        Schema::create('habitos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('id_user', 45);
            $table->tinyInteger('exercicio_fisico')->nullable();
            $table->longText('medicamento')->nullable();
            $table->enum('ingestao_bebida_alcoolica', ['MUITO', 'MODERADO', 'NAO_CONSOME'])->nullable();
            $table->tinyInteger('fuma')->nullable();
            $table->enum('qualidade_sono', ['BOA', 'RUIM', 'MODERADO'])->nullable();
            $table->integer('horas_sono')->nullable();
            $table->enum('apetite', ['MUITO', 'MODERADO', 'POUCO'])->nullable();
            $table->enum('ingestao_agua', ['MUITO', 'MODERADO', 'POUCO'])->nullable();
            $table->integer('ingestao_agua_qtd')->nullable();
            $table->enum('frequencia_urina', ['MUITO', 'MODERADO', 'POUCO'])->nullable();
            $table->string('coloracao_urina')->nullable();
            $table->timestamps();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('habitos');
    }
};
