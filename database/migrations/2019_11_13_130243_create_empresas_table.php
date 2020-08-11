<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('foto');
            $table->string('nombre');
            $table->integer('industria')->unsigned();
            $table->foreign('industria')->references('id')->on('industria');
            $table->string('gerente');
            $table->string('contacto');
            $table->string('fono');
            $table->string('direccion');
            $table->integer('comuna_id')->unsigned();
            $table->foreign('comuna_id')->references('id')->on('comuna');
            $table->string('email');
            $table->string('web')->nullable();
            $table->string('colaboradores');
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
        Schema::dropIfExists('empresas');
    }
}
