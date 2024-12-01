
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
        Schema::dropIfExists('historicos_alunos');
        Schema::create('historicos_alunos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_user');
            $table->longText('tratamento_medico')->nullable();
            $table->longText('antecedentes_oncologicos')->nullable();
            $table->longText('problemas_ortopedicos')->nullable();
            $table->tinyInteger('hipertensao')->nullable();
            $table->tinyInteger('diabetes')->nullable();
            $table->string('queixa')->nullable();
            $table->string('ultima_visita_clinico', 45)->nullable();
            $table->string('relizou_teste_esforco', 100)->nullable();
            $table->string('id_user', 100)->nullable();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('historicos_alunos');
    }
};
