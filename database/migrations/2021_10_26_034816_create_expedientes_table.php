<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prueba');
            $table->unsignedBigInteger('id_usuario');
            $table->string('titulo');
            $table->text('texto')->nullable();
	        $table->string('url_imagen')->nullable();
	        $table->string('url_recurso')->nullable();
            $table->string('url_archivo')->nullable();
            $table->foreign('id_prueba')->references('id')->on('prueba')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('expediente');
    }
}
