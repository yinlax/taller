<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla pedidos
class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->string('codigo', 10)->unique();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_mesa');
            $table->enum('estado', ['Pendiente', 'En Proceso', 'Listo', 'Entregado', 'Finalizado'])->default('Pendiente');
            $table->timestamps();
        
            // Definición de claves foráneas
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('set null');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_mesa')->references('id_mesa')->on('mesas')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
