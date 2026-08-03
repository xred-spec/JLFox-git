<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tela;

class TipoTelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tela::firstOrCreate(['nombre' => 'Royal']); //id: 1
        Tela::firstOrCreate(['nombre' => 'Poliester']); //id: 2
        Tela::firstOrCreate(['nombre' => 'Piel de durazno']); //id: 3
        Tela::firstOrCreate(['nombre' => 'Corazon y Flores']); //id: 4
        Tela::firstOrCreate(['nombre' => '65-35']); //id: 5
    }
}
