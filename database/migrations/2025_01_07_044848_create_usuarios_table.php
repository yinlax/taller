<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla usuarios
class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 50);
            $table->string('email', 30)->unique();
            $table->string('password', 255);
            $table->enum('estado', ['Activo', 'Inactivo', 'Bloqueado'])->default('Activo');

            // Clave foránea
            $table->unsignedBigInteger('id_rol')->nullable();
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}