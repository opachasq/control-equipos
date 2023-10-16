<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locadors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni',8);
            $table->string('codigo',12);
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('celular',9);
            $table->boolean('activo')->default(1);
            $table->unsignedBigInteger('genero_id');
            $table -> foreign('genero_id')->references('id')->on('generos');
            $table->unsignedBigInteger('area_id');
            $table -> foreign('area_id')->references('id')->on('areas');
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
        Schema::dropIfExists('locadors');
    }
}
