<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_caso');
            $table->string('descripcion');
	        $table->string('nombre');
            $table->foreign('id_caso')->references('id')->on('caso')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('prueba');
    }
}
