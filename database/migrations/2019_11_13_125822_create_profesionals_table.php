<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('foto');
            $table->string('nombre');
            $table->bigInteger('titulo')->unsigned();
            $table->foreign('titulo')->references('id')->on('profesiones');
            $table->string('email');
            $table->string('fnac');
            $table->string('genero');
            $table->string('fono');
            $table->string('direccion');
            $table->integer('comuna_id')->unsigned();
            $table->foreign('comuna_id')->references('id')->on('comuna');
            $table->string('civil');
            $table->integer('hijos');
            $table->bigInteger('afp')->unsigned();
            $table->foreign('afp')->references('id')->on('afps');
            $table->bigInteger('salud')->unsigned();
            $table->foreign('salud')->references('id')->on('isapres');
            $table->string('resumen', 1000)->nullable();
            $table->string('situacion')->nullable();
            $table->string('renta')->nullable();
            $table->string('cargo', 1000)->nullable();
            $table->string('porque', 1000)->nullable();
            $table->string('situacion_acad')->nullable();
            $table->string('ingles')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesionals');
    }
}
