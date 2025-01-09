<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Bebidas',
                'descripcion' => 'Todo tipo de bebidas refrescantes, gaseosas, jugos, etc.',
            ],
            [
                'nombre' => 'Sándwiches',
                'descripcion' => 'Variedad de sándwiches con diferentes ingredientes y combinaciones.',
            ],
        ]);
    }
}
