<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrendaProceso;

class PrendaProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Saco {
            //Delantero - DT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 1, 'orden' => 1, 'clave' => '']); //id: 1
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 2, 'orden' => 2, 'clave' => '']); //id: 2
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 3, 'orden' => 3, 'clave' => '']); //id: 3
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 4, 'orden' => 4, 'clave' => '']); //id: 4
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 5, 'orden' => 5, 'clave' => '']); //id: 5
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 6, 'orden' => 6, 'clave' => '']); //id: 6
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 7, 'orden' => 7, 'clave' => '']); //id: 7
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 8, 'orden' => 8, 'clave' => '']); //id: 8
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 9, 'orden' => 9, 'clave' => '']); //id: 9
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 10, 'orden' => 10, 'clave' => '']); //id: 10
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 11, 'orden' => 11, 'clave' => '']); //id: 11
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 12, 'orden' => 12, 'clave' => '']); //id: 12
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 13, 'orden' => 13, 'clave' => '']); //id: 13
            // }

            //Mangas - MG {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 14, 'orden' => 1, 'clave' => '']); //id: 14
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 15, 'orden' => 2, 'clave' => '']); //id: 15
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 16, 'orden' => 3, 'clave' => '']); //id: 16
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 17, 'orden' => 4, 'clave' => '']); //id: 17
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 18, 'orden' => 5, 'clave' => '']); //id: 18
            // }

            //Cartera - CA {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 19, 'orden' => 1, 'clave' => '']); //id: 19
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 20, 'orden' => 2, 'clave' => '']); //id: 20
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 21, 'orden' => 3, 'clave' => '']); //id: 21
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 22, 'orden' => 4, 'clave' => '']); //id: 22
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 23, 'orden' => 5, 'clave' => '']); //id: 23
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 24, 'orden' => 6, 'clave' => '']); //id: 24
            // }

            //Bata - BT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 4, 'proceso_id' => 25, 'orden' => 1, 'clave' => '']); //id: 25
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 4, 'proceso_id' => 26, 'orden' => 2, 'clave' => '']); //id: 26
            // }
            
            //Espalda - EP {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 27, 'orden' => 1, 'clave' => '']); //id: 27
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 28, 'orden' => 2, 'clave' => '']); //id: 28
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 29, 'orden' => 3, 'clave' => '']); //id: 29
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 30, 'orden' => 4, 'clave' => '']); //id: 30
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 31, 'orden' => 5, 'clave' => '']); //id: 31
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 32, 'orden' => 6, 'clave' => '']); //id: 32
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 33, 'orden' => 7, 'clave' => '']); //id: 33
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 34, 'orden' => 8, 'clave' => '']); //id: 34
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 35, 'orden' => 9, 'clave' => '']); //id: 35
            // }

            //Cuello / Tapa - CT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 36, 'orden' => 1, 'clave' => '']); //id: 36
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 37, 'orden' => 2, 'clave' => '']); //id: 37
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 38, 'orden' => 3, 'clave' => '']); //id: 38
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 39, 'orden' => 4, 'clave' => '']); //id: 39
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 40, 'orden' => 5, 'clave' => '']); //id: 40
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 41, 'orden' => 6, 'clave' => '']); //id: 41
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 42, 'orden' => 7, 'clave' => '']); //id: 42
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 43, 'orden' => 8, 'clave' => '']); //id: 43
            // }

            //Vista - VS {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 44, 'orden' => 1, 'clave' => '']); //id: 44
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 45, 'orden' => 2, 'clave' => '']); //id: 45
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 46, 'orden' => 3, 'clave' => '']); //id: 46
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 47, 'orden' => 4, 'clave' => '']); //id: 47
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 48, 'orden' => 5, 'clave' => '']); //id: 48
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 49, 'orden' => 6, 'clave' => '']); //id: 49
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 50, 'orden' => 7, 'clave' => '']); //id: 50
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 51, 'orden' => 8, 'clave' => '']); //id: 51
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 52, 'orden' => 9, 'clave' => '']); //id: 52
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 53, 'orden' => 10, 'clave' => '']); //id: 53
            // }

            //Cuerpo - CU {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 54, 'orden' => 1, 'clave' => '']); //id: 54
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 55, 'orden' => 2, 'clave' => '']); //id: 55
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 56, 'orden' => 3, 'clave' => '']); //id: 56
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 57, 'orden' => 4, 'clave' => '']); //id: 57
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 58, 'orden' => 5, 'clave' => '']); //id: 58
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 59, 'orden' => 6, 'clave' => '']); //id: 59
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 60, 'orden' => 7, 'clave' => '']); //id: 60
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 61, 'orden' => 8, 'clave' => '']); //id: 61
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 62, 'orden' => 9, 'clave' => '']); //id: 62
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 63, 'orden' => 10, 'clave' => '']); //id: 63
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 64, 'orden' => 11, 'clave' => '']); //id: 64
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 65, 'orden' => 12, 'clave' => '']); //id: 65
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 66, 'orden' => 13, 'clave' => '']); //id: 66
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 67, 'orden' => 14, 'clave' => '']); //id: 67
            // }

            //Saco - SC {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 68, 'orden' => 1, 'clave' => '']); //id: 68
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 69, 'orden' => 2, 'clave' => '']); //id: 69
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 70, 'orden' => 3, 'clave' => '']); //id: 70
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 71, 'orden' => 4, 'clave' => '']); //id: 71
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 72, 'orden' => 5, 'clave' => '']); //id: 72
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 73, 'orden' => 6, 'clave' => '']); //id: 73
            // 
        //
    }
}
