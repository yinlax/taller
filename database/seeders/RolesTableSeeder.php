<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['nombre' => 'Administrador'],
            ['nombre' => 'Supervisor'],
            ['nombre' => 'Mesero'],
            ['nombre' => 'Recepcionista'],
            ['nombre' => 'Cajero'],
        ]);
    }
}
