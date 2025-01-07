<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioRolesTable extends Migration
{
    public function up()
    {
        Schema::create('usuario_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_rol');
            $table->timestamps(0);

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');

            $table->primary(['id_usuario', 'id_rol']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_roles');
    }
}
