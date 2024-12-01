
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
        Schema::dropIfExists('planos_valores');
        Schema::create('planos_valores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('periodo')->nullable();
            $table->float('valor')->nullable();
            $table->float('desconto')->nullable();
            $table->integer('qnt_vezes')->nullable();
            $table->integer('id_plano')->nullable();

            $table->index(["id_plano"], 'fk_planos_valores_1_idx');


            $table->foreign('id_plano')
                ->references('id')->on('planos')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('planos_valores');
    }
};
