<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrendaPieza;

class PrendaPiezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Saco {
            PrendaPieza::firstOrCreate(['nombre' => 'Delantero', 'tipo_prenda_id' => 1]); //id: 1
            PrendaPieza::firstOrCreate(['nombre' => 'Espalda', 'tipo_prenda_id' => 1]); //id: 2
            PrendaPieza::firstOrCreate(['nombre' => 'Cuello', 'tipo_prenda_id' => 1]); //id: 3
            PrendaPieza::firstOrCreate(['nombre' => 'Tapa', 'tipo_prenda_id' => 1]); //id: 4
            PrendaPieza::firstOrCreate(['nombre' => 'Manga menor', 'tipo_prenda_id' => 1]); //id: 5
            PrendaPieza::firstOrCreate(['nombre' => 'Manga mayor', 'tipo_prenda_id' => 1]); //id: 6
            PrendaPieza::firstOrCreate(['nombre' => 'Vista', 'tipo_prenda_id' => 1]); //id: 7
            PrendaPieza::firstOrCreate(['nombre' => 'Vivos', 'tipo_prenda_id' => 1]); //id: 8
            PrendaPieza::firstOrCreate(['nombre' => 'Cartera', 'tipo_prenda_id' => 1]); //id: 9
            PrendaPieza::firstOrCreate(['nombre' => 'Batas', 'tipo_prenda_id' => 1]); //id: 10
            PrendaPieza::firstOrCreate(['nombre' => 'Costadillo', 'tipo_prenda_id' => 1]); //id: 11
        //}
    }
}
