<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Insumo;

class InsumosTableSeeder extends Seeder
{
    public function run()
    {
        // Crear algunos insumos de ejemplo
        Insumo::create([
            'nombre' => 'Harina',
            'cantidad' => 10.50,
            'unidad' => 'kg',
            'imagen' => 'harina.jpg',
        ]);

        Insumo::create([
            'nombre' => 'Aceite',
            'cantidad' => 5.00,
            'unidad' => 'litros',
            'imagen' => 'aceite.jpg',
        ]);

        Insumo::create([
            'nombre' => 'Leche',
            'cantidad' => 20.00,
            'unidad' => 'litros',
            'imagen' => 'leche.jpg',
        ]);
    }
}
