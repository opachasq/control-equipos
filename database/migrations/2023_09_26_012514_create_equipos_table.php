<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serie',25);
            $table->string('cod_patrimonial',50);
            $table->string('caracteristica',300);
            $table->boolean('activo')->default(1);
            $table->unsignedBigInteger('categoria_id');
            $table -> foreign('categoria_id')->references('id')->on('categorias'); 
            $table->unsignedBigInteger('marca_id');
            $table -> foreign('marca_id')->references('id')->on('marcas'); 
            $table->unsignedBigInteger('modelo_id');
            $table -> foreign('modelo_id')->references('id')->on('modelos'); 
            $table->unsignedBigInteger('color_id');
            $table -> foreign('color_id')->references('id')->on('colors'); 
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
        Schema::dropIfExists('equipos');
    }
}
