<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuzgadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juzgado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ciudad');
            $table->string('codigo')->unique();
        	$table->string('nombre');
            $table->foreign('id_ciudad')->references('id')->on('ciudad')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('juzgado');
    }
}
