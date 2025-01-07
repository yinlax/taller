<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla mesas
class CreateMesasTable extends Migration
{
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('id_mesa');
            $table->string('codigo', 10)->unique();
            $table->string('ubicacion', 20)->nullable();
            $table->integer('capacidad');
            $table->enum('estado', ['Disponible', 'Ocupada'])->default('Disponible');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mesas');
    }
}
