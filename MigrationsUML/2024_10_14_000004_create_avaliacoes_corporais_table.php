
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
        Schema::dropIfExists('avaliacoes_corporais');
        Schema::create('avaliacoes_corporais', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('biceps_d')->nullable();
            $table->integer('biceps_e')->nullable();
            $table->integer('antebraco_d')->nullable();
            $table->integer('antebraco_e')->nullable();
            $table->integer('ombros')->nullable();
            $table->integer('peitoral_e_dorsal')->nullable();
            $table->integer('abaixo_peitoral')->nullable();
            $table->integer('cintura')->nullable();
            $table->integer('acima_umbigo')->nullable();
            $table->integer('abdomen')->nullable();
            $table->integer('gluteos')->nullable();
            $table->integer('coxa_circular_maior_d')->nullable();
            $table->integer('coxa_circular_maior_e')->nullable();
            $table->integer('coxa_circular_menor_d')->nullable();
            $table->integer('coxa_circular_menor_e')->nullable();
            $table->integer('panturrilha_d')->nullable();
            $table->integer('id_user')->nullable();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('avaliacoes_corporais');
    }
};
