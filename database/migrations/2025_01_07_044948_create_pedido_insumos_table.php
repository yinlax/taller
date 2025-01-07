<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla pedido_insumos
class CreatePedidoInsumosTable extends Migration
{
    public function up()
    {
        Schema::create('pedido_insumos', function (Blueprint $table) {
            $table->id('id_pedido_insumo');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_insumo');
            $table->enum('accion', ['Agregar', 'Quitar']);
            $table->integer('cantidad');
            $table->decimal('costo', 6, 2);
            $table->timestamps();

            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_insumo')->references('id_insumo')->on('insumos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedido_insumos');
    }
}
