
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
        Schema::dropIfExists('exercicios_alunos');
        Schema::create('exercicios_alunos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_exercicio');
            $table->integer('id_aluno');
            $table->integer('series')->nullable();
            $table->integer('repeticoes')->nullable();
            $table->longText('observacao')->nullable();

            $table->index(["id_exercicio"], 'fk_exercicio_aluno_1_idx');

            $table->index(["id_aluno"], 'fk_exercicio_aluno_2_idx');


            $table->foreign('id_exercicio')
                ->references('id')->on('exercicios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_aluno')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('exercicios_alunos');
    }
};
