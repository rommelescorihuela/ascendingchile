<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('empresa')->unsigned()->index();
            $table->bigInteger('profesional')->unsigned()->index();

            $table->foreign('empresa')->references('id')->on('empresas');
            $table->foreign('profesional')->references('id')->on('profesionals');
            
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
        Schema::dropIfExists('interes');
    }
}
