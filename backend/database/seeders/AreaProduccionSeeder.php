<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaProduccion;

class AreaProduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AreaProduccion::firstOrCreate(['nombre' => 'Manual']); //id: 1
        AreaProduccion::firstOrCreate(['nombre' => 'Costura']); //id: 2
        AreaProduccion::firstOrCreate(['nombre' => 'Plancha']); //id: 3
        AreaProduccion::firstOrCreate(['nombre' => 'Fusión']); //id: 4
    }
}
