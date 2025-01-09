<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        // Crear 10 registros de clientes de prueba
        foreach (range(1, 10) as $index) {
            DB::table('clientes')->insert([
                'nombre' => $faker->name,  // Faker genera un nombre aleatorio
                'ci' => $faker->unique()->randomNumber(8), // Genera un número CI único
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}