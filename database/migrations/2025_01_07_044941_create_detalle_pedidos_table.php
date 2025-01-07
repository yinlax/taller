<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla detalle_pedidos
class CreateDetallePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->unsignedBigInteger('id_pedido'); 
            $table->unsignedBigInteger('id_producto'); 
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            $table->foreign('id_pedido')
                ->references('id_pedido')->on('pedidos')
                ->onDelete('cascade');
            
            $table->foreign('id_producto')
                ->references('id_producto')->on('productos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
       
        Schema::dropIfExists('detalle_pedidos');
    }
}
