<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla insumos
class CreateInsumosTable extends Migration
{
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id('id_insumo');
            $table->string('nombre', 50);
            $table->decimal('cantidad', 6, 2);
            $table->string('unidad', 10)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insumos');
    }
}
