<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'password' => '12345678',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Ana Gómez',
                'email' => 'ana@example.com',
                'password' => '12345678',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Carlos Sánchez',
                'email' => 'carlos@example.com',
                'password' => '12345678',
                'estado' => 'Inactivo'
            ],
            [
                'nombre' => 'Luis Rodríguez',
                'email' => 'luis@example.com',
                'password' => '12345678',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Marta Fernández',
                'email' => 'marta@example.com',
                'password' => '12345678',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Pedro González',
                'email' => 'pedro@example.com',
                'password' => '12345678',
                'estado' => 'Bloqueado'
            ],
        ]);
    }
}