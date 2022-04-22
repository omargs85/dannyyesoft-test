<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_corporativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('S_NombreCorto', 45);
            $table->string('S_NombreCompleto', 75);
            $table->string('S_LogoURL')->nullable();
            $table->string('S_DBName', 45);
            $table->string('S_DBUsuario', 45);
            $table->string('S_DBPassword', 155);
            $table->string('S_SystemUrl');
            $table->tinyInteger('S_Activo');
            $table->timestamp('D_FechaIncorporacion');
            $table->unsignedInteger('tw_usuarios_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tw_usuarios_id')->references('id')->on('tw_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_corporativos');
    }
}
