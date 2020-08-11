<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulacions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('oferta_id')->unsigned()->index();
            $table->bigInteger('profesional')->unsigned()->index();

            $table->foreign('oferta_id')->references('id')->on('ofertas');
            $table->foreign('profesional')->references('id')->on('profesionals');

            $table->integer('estado')->default('0');
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
        Schema::dropIfExists('postulacions');
    }
}
