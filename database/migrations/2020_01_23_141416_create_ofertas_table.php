<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('industria')->unsigned();
            $table->foreign('industria')->references('id')->on('industria');
            $table->string('cargo');
            $table->string('lugar');
            $table->string('jornada');
            $table->string('ciudad');
            $table->string('descripcion', 1000);
            $table->string('excluyentes', 1000);
            $table->string('deseables', 1000);
            $table->string('renta_fija');
            $table->string('renta_variable');
            $table->string('bonos');
            $table->string('beneficios', 1000);
            $table->string('porque', 1000);
            $table->integer('estado')->default('1');
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
        Schema::dropIfExists('ofertas');
    }
}