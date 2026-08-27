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
        TipoPrenda::firstOrCreate(['nombre' => 'Saco']); //id: 1
        TipoPrenda::firstOrCreate(['nombre' => 'Pantalón']); //id: 2
        TipoPrenda::firstOrCreate(['nombre' => 'Camisola flores']); //id: 3
        TipoPrenda::firstOrCreate(['nombre' => 'C. Rodeo c/vivo']); //id: 4
    }
}
