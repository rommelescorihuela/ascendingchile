<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevantamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levantamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('cargo');
            $table->string('ubicacion');
            $table->string('superior');
            $table->string('supervisa');
            $table->string('proposito', 1000);
            $table->string('funciones', 1000);
            $table->string('competencias');
            $table->string('comunicacion');
            $table->string('deseables', 1000);
            $table->string('excluyentes', 1000);
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
        Schema::dropIfExists('levantamientos');
    }
}
