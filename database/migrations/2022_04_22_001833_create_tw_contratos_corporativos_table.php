<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwContratosCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_contratos_corporativos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('D_FechaInicio');
            $table->timestamp('D_FechaFin');
            $table->string('S_URLContrato');

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
        Schema::dropIfExists('tw_contratos_corporativos');
    }
}
