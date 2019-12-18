<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('medicacions', function (Blueprint $table){
            $table->increments('id');
            $table->integer('unidades');
            $table->string('frecuencia');
            $table->string('instrucciones');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->unsignedInteger('medicina_id');
            $table->unsignedInteger('tratamiento_id');
            $table->timestamps();

            $table->foreign('medicina_id')->references('id')->on('medicinas');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');
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
    }
}
