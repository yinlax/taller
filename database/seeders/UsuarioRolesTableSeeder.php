<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioRolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuario_roles')->insert([
            ['id_usuario' => 1, 'id_rol' => 1], // Juan Pérez - Administrador
            ['id_usuario' => 2, 'id_rol' => 2], // Ana Gómez - Supervisor
            ['id_usuario' => 3, 'id_rol' => 3], // Carlos Sánchez - Mesero
            ['id_usuario' => 4, 'id_rol' => 4], // Luis Rodríguez - Recepcionista
            ['id_usuario' => 5, 'id_rol' => 5], // Marta Fernández - Cajero
            ['id_usuario' => 6, 'id_rol' => 3], // Pedro González - Mesero
        ]);

        
    }
}

