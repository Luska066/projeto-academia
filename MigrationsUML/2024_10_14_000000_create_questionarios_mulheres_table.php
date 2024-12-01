
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
        Schema::dropIfExists('questionarios_mulheres');
        Schema::create('questionarios_mulheres', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_user');
            $table->enum('ciclo_mestrual', ['REGULAR', 'IRREGULAR'])->nullable();
            $table->tinyInteger('gravida')->nullable();
            $table->tinyInteger('pretende_engravidar')->nullable();
            $table->string('metodo_contraceptivo')->nullable();
            $table->string('ovario_policisticos')->nullable();
            $table->longText('id_user')->nullable();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('questionarios_mulheres');
    }
};
