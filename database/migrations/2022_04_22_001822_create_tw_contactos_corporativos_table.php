<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwContactosCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_contactos_corporativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('S_Nombre', 45);
            $table->string('S_Puesto', 45);
            $table->string('S_Comentarios')->nullable();
            $table->string('N_TelefonoFijo', 12);
            $table->string('N_TelefonoMovil', 12);
            $table->string('S_Email', 45);
            $table->unsignedInteger('tw_corporativos_id');

            $table->foreign('tw_corporativos_id')->references('id')->on('tw_corporativos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_contactos_corporativos');
    }
}
