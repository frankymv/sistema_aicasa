<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatrizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('matrices_productos')->insert([
            [
                'codigo' => 'ATP',
                'matriz_base' => 'Atol de pinol',
                'familia' => 'Atol',
                'descripcion' => null,
            ],
            [
                'codigo' => 'ATP-VAI',
                'matriz_base' => 'Atol de pinol Sabor Vainilla',
                'familia' => 'Atol',
                'descripcion' => null,
            ],
            [
                'codigo' => 'ATP-FRE',
                'matriz_base' => 'Atol de pinol Sabor Fresa',
                'familia' => 'Atol',
                'descripcion' => null,
            ],
            [
                'codigo' => 'ATP-CHO',
                'matriz_base' => 'Atol de pinol Sabor Chocolate',
                'familia' => 'Atol',
                'descripcion' => null,
            ],
            [
                'codigo' => 'ATH',
                'matriz_base' => 'Atol de haba',
                'familia' => 'Atol',
                'descripcion' => null,
            ],
            [
                'codigo' => 'PAP-TRI',
                'matriz_base' => 'Papilla de trigo',
                'familia' => 'Papilla',
                'descripcion' => null,
            ],
            [
                'codigo' => 'PAP-ARR',
                'matriz_base' => 'Papilla de arroz',
                'familia' => 'Papilla',
                'descripcion' => null,
            ],
            [
                'codigo' => 'LED',
                'matriz_base' => 'Leche descremada',
                'familia' => 'Leche',
                'descripcion' => null,
            ],
            [ 
                'codigo' => 'LED-VAI',
                'matriz_base' => 'Leche descremada Sabor Vainilla',
                'familia' => 'Leche',
                'descripcion' => null,
            ],
            [
                'codigo' => 'LED-FRE',
                'matriz_base' => 'Leche descremada Sabor Fresa',
                'familia' => 'Leche',
                'descripcion' => null,
            ],
            [
                'codigo' => 'LED-CHO',
                'matriz_base' => 'Leche descremada Sabor Chocolate',
                'familia' => 'Leche',
                'descripcion' => null,
            ],
            [
                'codigo' => 'PRO-LEC',
                'matriz_base' => 'Proteína de Leche',
                'familia' => 'Proteína',
                'descripcion' => null,
            ],
            [
                'codigo' => 'HOR-ARR',
                'matriz_base' => 'Horchata de Arroz',
                'familia' => 'Horchata',
                'descripcion' => null,
            ],
            [
                'codigo' => 'HOR-AVE',
                'matriz_base' => 'Horchata de Avena',
                'familia' => 'Horchata',
                'descripcion' => null,
            ],
            [
                'codigo' => 'HOR-AVE-VAI',
                'matriz_base' => 'Horchata de Avena Sabor Vainilla',
                'familia' => 'Horchata',
                'descripcion' => null,
            ],
            [
                'codigo' => 'HOR-AVE-FRE',
                'matriz_base' => 'Horchata de Avena Sabor Fresa',
                'familia' => 'Horchata',
                'descripcion' => null,
            ],
            [
                'codigo' => 'HOR-AVE-CHO',
                'matriz_base' => 'Horchata de Avena Sabor Chocolate',
                'familia' => 'Horchata',
                'descripcion' => null,
            ],
        ]);

    }
}
