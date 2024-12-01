
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
        Schema::dropIfExists('fluxo_caixa');
        Schema::create('fluxo_caixa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->enum('tipo', ['RECEITA', 'DESPESA','PAGAMENTO'])->nullable();
            $table->float('valor')->nullable();
            $table->longText('nome')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('feito_por', 100)->nullable();
            $table->float('desconto')->nullable();

            $table->index(["id_user"], 'fk_fluxo_caixa_1_idx');


            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->timestamps();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('fluxo_caixa');
    }
};
