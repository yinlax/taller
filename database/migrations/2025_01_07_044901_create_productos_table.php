<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla productos
class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre', 30);
            $table->string('descripcion', 100)->nullable();
            $table->decimal('precio', 6, 2);
            $table->string('imagen', 255)->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->timestamps();
        
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('set null');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
