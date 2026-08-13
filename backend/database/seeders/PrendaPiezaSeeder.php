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
            PrendaPieza::firstOrCreate(['nombre' => 'Mangas', 'tipo_prenda_id' => 1]); //id: 2
            PrendaPieza::firstOrCreate(['nombre' => 'Cartera', 'tipo_prenda_id' => 1]); //id: 3
            PrendaPieza::firstOrCreate(['nombre' => 'Bata', 'tipo_prenda_id' => 1]); //id: 4
            PrendaPieza::firstOrCreate(['nombre' => 'Espalda', 'tipo_prenda_id' => 1]); //id: 5
            PrendaPieza::firstOrCreate(['nombre' => 'Cuello / Tapa', 'tipo_prenda_id' => 1]); //id: 6
            PrendaPieza::firstOrCreate(['nombre' => 'Vista', 'tipo_prenda_id' => 1]); //id: 7
            PrendaPieza::firstOrCreate(['nombre' => 'Cuerpo', 'tipo_prenda_id' => 1]); //id: 8
            PrendaPieza::firstOrCreate(['nombre' => 'Saco', 'tipo_prenda_id' => 1]); //id: 9
        //}

        //Pantalón {
            PrendaPieza::firstOrCreate(['nombre' => 'Trasero', 'tipo_prenda_id' => 2]); //id: 10
            PrendaPieza::firstOrCreate(['nombre' => 'Delantero', 'tipo_prenda_id' => 2]); //id: 11
            PrendaPieza::firstOrCreate(['nombre' => 'Pretina', 'tipo_prenda_id' => 2]); //id: 12
        //}

        //Camisola flores {
            PrendaPieza::firstOrCreate(['nombre' => 'Espalda', 'tipo_prenda_id' => 3]); //id: 13
            PrendaPieza::firstOrCreate(['nombre' => 'Delantero', 'tipo_prenda_id' => 3]); //id: 14
            PrendaPieza::firstOrCreate(['nombre' => 'Mangas', 'tipo_prenda_id' => 3]); //id: 15
            PrendaPieza::firstOrCreate(['nombre' => 'Hombros', 'tipo_prenda_id' => 3]); //id: 16
            PrendaPieza::firstOrCreate(['nombre' => 'Cuello / Pie cuello', 'tipo_prenda_id' => 3]); //id: 17
            PrendaPieza::firstOrCreate(['nombre' => 'Puños', 'tipo_prenda_id' => 3]); //id: 18
            PrendaPieza::firstOrCreate(['nombre' => 'Cuerpo', 'tipo_prenda_id' => 3]); //id: 19
        //}

        //Camisa rodeo con vivo {
            PrendaPieza::firstOrCreate(['nombre' => 'Bata delantera', 'tipo_prenda_id' => 4]); //id: 20
            PrendaPieza::firstOrCreate(['nombre' => 'Bata trasera', 'tipo_prenda_id' => 4]); //id: 21
            PrendaPieza::firstOrCreate(['nombre' => 'Delantero', 'tipo_prenda_id' => 4]); //id: 22
            PrendaPieza::firstOrCreate(['nombre' => 'Espalda', 'tipo_prenda_id' => 4]); //id: 23
            PrendaPieza::firstOrCreate(['nombre' => 'Cartera', 'tipo_prenda_id' => 4]); //id: 24
            PrendaPieza::firstOrCreate(['nombre' => 'Mangas', 'tipo_prenda_id' => 4]); //id: 25
            PrendaPieza::firstOrCreate(['nombre' => 'Hombros', 'tipo_prenda_id' => 4]); //id: 26
            PrendaPieza::firstOrCreate(['nombre' => 'Cuello / Pie cuello', 'tipo_prenda_id' => 4]); //id: 27
            PrendaPieza::firstOrCreate(['nombre' => 'Puños', 'tipo_prenda_id' => 4]); //id: 28
            PrendaPieza::firstOrCreate(['nombre' => 'Cuerpo', 'tipo_prenda_id' => 4]); //id: 29
        //}
    }
}
