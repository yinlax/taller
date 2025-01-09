<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Coca-Cola',
                'descripcion' => 'Refresco carbonatado de cola',
                'precio' => 1.50,
                'imagen' => 'images.jpg',  
                'estado' => 'Activo',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'Pepsi',
                'descripcion' => 'Refresco carbonatado de cola',
                'precio' => 1.40,
                'imagen' => 'pepsi.jpg', 
                'estado' => 'Activo',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'Jugo de Naranja',
                'descripcion' => 'Jugo natural de naranja fresco',
                'precio' => 2.00,
                'imagen' => 'jugo-naranja.jpg',
                'estado' => 'Activo',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'Sándwich de Jamón y Queso',
                'descripcion' => 'Sándwich con jamón y queso derretido',
                'precio' => 3.00,
                'imagen' => 'hamburguesa-clasica.jpg',
                'estado' => 'Activo',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Sándwich Vegetariano',
                'descripcion' => 'Sándwich con vegetales frescos y queso',
                'precio' => 3.50,
                'imagen' => 'sandwich-vegetariano.jpg',
                'estado' => 'Activo',
                'id_categoria' => 2,
            ],
        ]);
    }
}
