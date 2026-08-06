<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoPrenda;

class TipoPrendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoPrenda::firstOrCreate(['nombre' => 'Saco liso']); //id: 1
        TipoPrenda::firstOrCreate(['nombre' => 'Saco royal']); //id: 2
        TipoPrenda::firstOrCreate(['nombre' => 'Camisa']); //id: 3
        TipoPrenda::firstOrCreate(['nombre' => 'Pantalón']); //id: 4
    }
}
