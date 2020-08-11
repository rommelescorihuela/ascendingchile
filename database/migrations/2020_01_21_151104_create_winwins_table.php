<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinwinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winwins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo');
            $table->string('web')->nullable();
            $table->string('servicios');
            $table->integer('industria')->unsigned();
            $table->foreign('industria')->references('id')->on('industria');
            $table->string('email');
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('fono')->nullable();
            $table->integer('permiso')->default('0');
            $table->string('rut')->nullable();
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
        Schema::dropIfExists('winwins');
    }
}
