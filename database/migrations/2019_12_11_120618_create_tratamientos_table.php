<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tratamientos', function (Blueprint $table){
            $table->increments('id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('descripcion');
            $table->unsignedInteger('paciente_id');
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tratamientos');
    }
}
