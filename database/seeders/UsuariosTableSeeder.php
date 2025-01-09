<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'id_rol' => '1',
                'nombre' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'password' => Hash::make('12345678'),
                'estado' => 'Activo'
            ],
            [
                'id_rol' => '2',
                'nombre' => 'Ana Gómez',
                'email' => 'ana@example.com',
                'password' => Hash::make('12345678'),
                'estado' => 'Activo'
            ],
            [
                'id_rol' => '3',
                'nombre' => 'Carlos Sánchez',
                'email' => 'carlos@example.com',
                'password' => Hash::make('12345678'),
                'estado' => 'Inactivo'
            ],
            [
                'id_rol' => '4',
                'nombre' => 'Luis Rodríguez',
                'email' => 'luis@example.com',
                'password' => Hash::make('12345678'),
                'estado' => 'Activo'
            ],
            [
                'id_rol' => '5',
                'nombre' => 'Marta Fernández',
                'email' => 'marta@example.com',
                'password' => Hash::make('12345678'),
                'estado' => 'Activo'
            ],
            [
                'id_rol' => '3',
                'nombre' => 'Pedro González',
                'email' => 'pedro@example.com',
                'password' => Hash::make('12345678'),
                'estado' => 'Bloqueado'
            ],
        ]);
    }
}