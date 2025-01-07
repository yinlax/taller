<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla facturas
class CreateFacturasTable extends Migration
{
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->unsignedBigInteger('id_pedido');
            $table->decimal('total', 6, 2);
            $table->timestamps();

            $table->foreign('id_pedido')
                ->references('id_pedido')->on('pedidos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facturas');
    }

}

