<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla productos_insumos
class CreateProductosInsumosTable extends Migration
{
    public function up()
    {
        Schema::create('productos_insumos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_insumo');
            $table->decimal('cantidad', 6, 2);
            $table->timestamps();
        
            $table->primary(['id_producto', 'id_insumo']);
        
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_insumo')->references('id_insumo')->on('insumos')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('productos_insumos');
    }
}
