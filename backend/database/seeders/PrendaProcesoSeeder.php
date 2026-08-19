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
        //Saco liso {
            //Delantero - DT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 1, 'orden' => 1, 'clave' => 'SL-C-DT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 1
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 2, 'orden' => 2, 'clave' => 'SL-P-DT-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 2
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 3, 'orden' => 3, 'clave' => 'SL-F-DT-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 3
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 4, 'orden' => 4, 'clave' => 'SL-M-DT-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 4
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 5, 'orden' => 5, 'clave' => 'SL-C-DT-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 5
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 6, 'orden' => 6, 'clave' => 'SL-M-DT-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 6
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 7, 'orden' => 7, 'clave' => 'SL-C-DT-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 7
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 8, 'orden' => 8, 'clave' => 'SL-P-DT-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 1, 'tiempo_previsto_segundo' => 37]); //id: 8 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 9, 'orden' => 9, 'clave' => 'SL-C-DT-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 9
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 10, 'orden' => 10, 'clave' => 'SL-M-DT-11', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 10
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 11, 'orden' => 11, 'clave' => 'SL-M-DT-12', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 11
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 12, 'orden' => 12, 'clave' => 'SL-C-DT-13', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 12
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 13, 'orden' => 13, 'clave' => 'SL-M-DT-14', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 13
            // }

            //Mangas - MG {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 14, 'orden' => 1, 'clave' => 'SL-C-MG-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 14
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 15, 'orden' => 2, 'clave' => 'SL-P-MG-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 15
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 16, 'orden' => 3, 'clave' => 'SL-M-MG-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 2, 'tiempo_previsto_segundo' => 4]); //id: 16 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 17, 'orden' => 4, 'clave' => 'SL-C-MG-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 17
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 18, 'orden' => 5, 'clave' => 'SL-P-MG-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 18
            // }

            //Cartera - CA {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 19, 'orden' => 1, 'clave' => 'SL-F-CA-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 19
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 20, 'orden' => 2, 'clave' => 'SL-M-CA-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 20
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 21, 'orden' => 3, 'clave' => 'SL-C-CA-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 21
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 22, 'orden' => 4, 'clave' => 'SL-M-CA-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 22
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 23, 'orden' => 5, 'clave' => 'SL-C-CA-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 23
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 3, 'proceso_id' => 24, 'orden' => 6, 'clave' => 'SL-M-CA-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 24
            // }

            //Bata - BT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 4, 'proceso_id' => 25, 'orden' => 1, 'clave' => 'SL-F-BT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 25
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 4, 'proceso_id' => 26, 'orden' => 2, 'clave' => 'SL-M-BT-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 26
            // }
            
            //Espalda - EP {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 27, 'orden' => 1, 'clave' => 'SL-C-EP-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 27
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 28, 'orden' => 2, 'clave' => 'SL-P-EP-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 4, 'tiempo_previsto_segundo' => 0]); //id: 28 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 29, 'orden' => 3, 'clave' => 'SL-F-EP-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 29
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 30, 'orden' => 4, 'clave' => 'SL-M-EP-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 30
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 31, 'orden' => 5, 'clave' => 'SL-C-EP-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 31
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 32, 'orden' => 6, 'clave' => 'SL-M-EP-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 32
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 33, 'orden' => 7, 'clave' => 'SL-C-EP-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 33
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 34, 'orden' => 8, 'clave' => 'SL-P-EP-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 34
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 35, 'orden' => 9, 'clave' => 'SL-C-EP-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 35
            // }

            //Cuello / Tapa - CT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 36, 'orden' => 1, 'clave' => 'SL-F-CT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 36
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 37, 'orden' => 2, 'clave' => 'SL-M-CT-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 37
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 38, 'orden' => 3, 'clave' => 'SL-C-CT-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 38
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 39, 'orden' => 4, 'clave' => 'SL-P-CT-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 1, 'tiempo_previsto_segundo' => 45]); //id: 39 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 40, 'orden' => 5, 'clave' => 'SL-M-CT-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 40
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 41, 'orden' => 6, 'clave' => 'SL-P-CT-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 1, 'tiempo_previsto_segundo' => 33]); //id: 41 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 42, 'orden' => 7, 'clave' => 'SL-M-CT-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 42
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 43, 'orden' => 8, 'clave' => 'SL-C-CT-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 43
            // }

            //Vista - VS {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 44, 'orden' => 1, 'clave' => 'SL-F-VS-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 44
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 45, 'orden' => 2, 'clave' => 'SL-M-VS-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 45
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 46, 'orden' => 3, 'clave' => 'SL-C-VS-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 46
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 47, 'orden' => 4, 'clave' => 'SL-M-VS-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 47
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 48, 'orden' => 5, 'clave' => 'SL-C-VS-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 48
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 49, 'orden' => 6, 'clave' => 'SL-M-VS-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 49
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 50, 'orden' => 7, 'clave' => 'SL-C-VS-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 50
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 51, 'orden' => 8, 'clave' => 'SL-C-VS-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 51
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 52, 'orden' => 9, 'clave' => 'SL-P-VS-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 52
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 7, 'proceso_id' => 53, 'orden' => 10, 'clave' => 'SL-C-VS-11', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 53
            // }

            //Cuerpo - CU {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 54, 'orden' => 1, 'clave' => 'SL-M-CU-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 54
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 55, 'orden' => 2, 'clave' => 'SL-C-CU-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 55
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 56, 'orden' => 3, 'clave' => 'SL-P-CU-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 12, 'tiempo_previsto_segundo' => 25]); //id: 56 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 57, 'orden' => 4, 'clave' => 'SL-P-CU-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 6, 'tiempo_previsto_segundo' => 21]); //id: 57 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 58, 'orden' => 5, 'clave' => 'SL-C-CU-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 58
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 59, 'orden' => 6, 'clave' => 'SL-P-CU-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 4, 'tiempo_previsto_segundo' => 26]); //id: 59 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 60, 'orden' => 7, 'clave' => 'SL-M-CU-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 60
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 61, 'orden' => 8, 'clave' => 'SL-C-CU-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 61
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 62, 'orden' => 9, 'clave' => 'SL-C-CU-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 62
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 63, 'orden' => 10, 'clave' => 'SL-P-CU-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 63
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 64, 'orden' => 11, 'clave' => 'SL-M-CU-11', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 64
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 65, 'orden' => 12, 'clave' => 'SL-C-CU-12', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 65
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 66, 'orden' => 13, 'clave' => 'SL-C-CU-13', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 66
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 67, 'orden' => 14, 'clave' => 'SL-C-CU-14', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 67
            // }

            //Saco - SC {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 68, 'orden' => 1, 'clave' => 'SL-M-SC-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 68
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 69, 'orden' => 2, 'clave' => 'SL-M-SC-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 69
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 70, 'orden' => 3, 'clave' => 'SL-M-SC-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 70
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 71, 'orden' => 4, 'clave' => 'SL-M-SC-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 71
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 72, 'orden' => 5, 'clave' => 'SL-P-SC-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 18, 'tiempo_previsto_segundo' => 57]); //id: 72 --ht
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 73, 'orden' => 6, 'clave' => 'SL-M-SC-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 73
            //} 
        //}

        //Pantalón {
            //Trasero - TS {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 74, 'orden' => 1, 'clave' => 'PT-C-TS-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 74
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 75, 'orden' => 2, 'clave' => 'PT-C-TS-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 75
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 76, 'orden' => 3, 'clave' => 'PT-P-TS-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 76
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 77, 'orden' => 4, 'clave' => 'PT-M-TS-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 77
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 78, 'orden' => 5, 'clave' => 'PT-C-TS-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 78
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 79, 'orden' => 6, 'clave' => 'PT-M-TS-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 79
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 80, 'orden' => 7, 'clave' => 'PT-F-TS-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 80
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 81, 'orden' => 8, 'clave' => 'PT-M-TS-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 81
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 82, 'orden' => 9, 'clave' => 'PT-C-TS-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 82
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 83, 'orden' => 10, 'clave' => 'PT-M-TS-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 83
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 84, 'orden' => 11, 'clave' => 'PT-C-TS-11', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 84
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 85, 'orden' => 12, 'clave' => 'PT-M-TS-12', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 85
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 86, 'orden' => 13, 'clave' => 'PT-M-TS-13', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 86
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 10, 'proceso_id' => 87, 'orden' => 14, 'clave' => 'PT-C-TS-14', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 87
            //}

            //Delantero - DT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 88, 'orden' => 1, 'clave' => 'PT-C-DT-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 88
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 89, 'orden' => 2, 'clave' => 'PT-C-DT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 89
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 90, 'orden' => 3, 'clave' => 'PT-M-DT-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 90
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 91, 'orden' => 4, 'clave' => 'PT-C-DT-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 91
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 92, 'orden' => 5, 'clave' => 'PT-C-DT-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 92
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 93, 'orden' => 6, 'clave' => 'PT-C-DT-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 93
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 94, 'orden' => 7, 'clave' => 'PT-M-DT-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 94
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 95, 'orden' => 8, 'clave' => 'PT-P-DT-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 95
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 96, 'orden' => 9, 'clave' => 'PT-C-DT-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 96
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 97, 'orden' => 10, 'clave' => 'PT-C-DT-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 97
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 98, 'orden' => 11, 'clave' => 'PT-F-DT-11', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 98
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 99, 'orden' => 12, 'clave' => 'PT-C-DT-12', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 99
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 100, 'orden' => 13, 'clave' => 'PT-C-DT-13', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 100
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 11, 'proceso_id' => 101, 'orden' => 14, 'clave' => 'PT-C-DT-14', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 101
            //}

            //Pretina - PR {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 102, 'orden' => 1, 'clave' => 'PT-F-PR-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 102
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 103, 'orden' => 2, 'clave' => 'PT-C-PR-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 103
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 104, 'orden' => 3, 'clave' => 'PT-C-PR-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 104
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 105, 'orden' => 4, 'clave' => 'PT-P-PR-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 105
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 106, 'orden' => 5, 'clave' => 'PT-M-PR-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 106
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 107, 'orden' => 6, 'clave' => 'PT-C-PR-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 107
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 108, 'orden' => 7, 'clave' => 'PT-C-PR-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 108
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 12, 'proceso_id' => 109, 'orden' => 8, 'clave' => 'PT-C-PR-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 109
            //}
        //}

        //Camisola flores {
            //Espalda EP {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 13, 'proceso_id' => 110, 'orden' => 1, 'clave' => 'CF-C-EP-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 110
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 13, 'proceso_id' => 111, 'orden' => 2, 'clave' => 'CF-C-EP-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 111
            //}

            //Delantero DT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 14, 'proceso_id' => 112, 'orden' => 1, 'clave' => 'CF-C-DT-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 112
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 14, 'proceso_id' => 113, 'orden' => 2, 'clave' => 'CF-C-DT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 113
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 14, 'proceso_id' => 114, 'orden' => 3, 'clave' => 'CF-C-DT-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 114
            //}

            //Mangas MG {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 15, 'proceso_id' => 115, 'orden' => 1, 'clave' => 'CF-C-MG-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 115
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 15, 'proceso_id' => 116, 'orden' => 2, 'clave' => 'CF-C-MG-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 116
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 15, 'proceso_id' => 117, 'orden' => 3, 'clave' => 'CF-M-MG-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 117
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 15, 'proceso_id' => 118, 'orden' => 4, 'clave' => 'CF-C-MG-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 118
            //}

            //Hombros HB {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 16, 'proceso_id' => 119, 'orden' => 1, 'clave' => 'CF-C-HB-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 119
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 16, 'proceso_id' => 120, 'orden' => 2, 'clave' => 'CF-C-HB-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 120
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 16, 'proceso_id' => 121, 'orden' => 3, 'clave' => 'CF-M-HB-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 121
            //}

            //Cuello / Pie cuello PC {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 17, 'proceso_id' => 122, 'orden' => 1, 'clave' => 'CF-F-PC-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 122
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 17, 'proceso_id' => 123, 'orden' => 2, 'clave' => 'CF-C-PC-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 123
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 17, 'proceso_id' => 124, 'orden' => 3, 'clave' => 'CF-M-PC-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 124
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 17, 'proceso_id' => 125, 'orden' => 4, 'clave' => 'CF-C-PC-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 125
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 17, 'proceso_id' => 126, 'orden' => 5, 'clave' => 'CF-C-PC-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 126
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 17, 'proceso_id' => 127, 'orden' => 6, 'clave' => 'CF-C-PC-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 127
            //}

            //Puños PÑ {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 18, 'proceso_id' => 128, 'orden' => 1, 'clave' => 'CF-F-PÑ-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 128
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 18, 'proceso_id' => 129, 'orden' => 2, 'clave' => 'CF-M-PÑ-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 129
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 18, 'proceso_id' => 130, 'orden' => 3, 'clave' => 'CF-C-PÑ-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 130
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 18, 'proceso_id' => 131, 'orden' => 4, 'clave' => 'CF-M-PÑ-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 131
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 18, 'proceso_id' => 132, 'orden' => 5, 'clave' => 'CF-C-PÑ-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 132
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 18, 'proceso_id' => 133, 'orden' => 6, 'clave' => 'CF-P-PÑ-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 133
            //}

            //Cuerpo CU {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 134, 'orden' => 1, 'clave' => 'CF-C-CU-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 134
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 135, 'orden' => 2, 'clave' => 'CF-C-CU-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 135
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 136, 'orden' => 3, 'clave' => 'CF-C-CU-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 136
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 137, 'orden' => 4, 'clave' => 'CF-M-CU-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 137
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 138, 'orden' => 5, 'clave' => 'CF-M-CU-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 138
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 139, 'orden' => 6, 'clave' => 'CF-C-CU-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 139
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 140, 'orden' => 7, 'clave' => 'CF-M-CU-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 140
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 141, 'orden' => 8, 'clave' => 'CF-P-CU-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 141
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 142, 'orden' => 9, 'clave' => 'CF-M-CU-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 142
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 19, 'proceso_id' => 143, 'orden' => 10, 'clave' => 'CF-M-CU-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 143
            //}
        //}

        //Camisa rodeo con vivo {
            //Bata delantera BD {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 20, 'proceso_id' => 144, 'orden' => 1, 'clave' => 'CRV-C-BD-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 144
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 20, 'proceso_id' => 145, 'orden' => 2, 'clave' => 'CRV-C-BD-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 145
            //}

            //Bata trasera BT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 21, 'proceso_id' => 146, 'orden' => 1, 'clave' => 'CRV-C-BT-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 146
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 21, 'proceso_id' => 147, 'orden' => 2, 'clave' => 'CRV-C-BT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 147
            //}

            //Delantero DT {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 148, 'orden' => 1, 'clave' => 'CRV-M-DT-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 148
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 149, 'orden' => 2, 'clave' => 'CRV-C-DT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 149
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 150, 'orden' => 3, 'clave' => 'CRV-M-DT-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 150
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 151, 'orden' => 4, 'clave' => 'CRV-C-DT-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 151
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 152, 'orden' => 5, 'clave' => 'CRV-C-DT-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 152
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 153, 'orden' => 6, 'clave' => 'CRV-C-DT-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 153
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 154, 'orden' => 7, 'clave' => 'CRV-C-DT-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 154
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 22, 'proceso_id' => 155, 'orden' => 8, 'clave' => 'CRV-C-DT-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 155
            //}

            //Espalda EP {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 23, 'proceso_id' => 156, 'orden' => 1, 'clave' => 'CRV-C-EP-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 156
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 23, 'proceso_id' => 157, 'orden' => 2, 'clave' => 'CRV-C-EP-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 157
            //}

            //Cartera CA {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 24, 'proceso_id' => 158, 'orden' => 1, 'clave' => 'CRV-F-CA-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 158
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 24, 'proceso_id' => 159, 'orden' => 2, 'clave' => 'CRV-M-CA-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 159
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 24, 'proceso_id' => 160, 'orden' => 3, 'clave' => 'CRV-C-CA-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 160
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 24, 'proceso_id' => 161, 'orden' => 4, 'clave' => 'CRV-M-CA-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 161
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 24, 'proceso_id' => 162, 'orden' => 5, 'clave' => 'CRV-P-CA-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 162
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 24, 'proceso_id' => 163, 'orden' => 6, 'clave' => 'CRV-M-CA-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 163
            //}

            //Mangas MG {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 25, 'proceso_id' => 164, 'orden' => 1, 'clave' => 'CRV-C-MG-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 164
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 25, 'proceso_id' => 165, 'orden' => 2, 'clave' => 'CRV-C-MG-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 165
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 25, 'proceso_id' => 166, 'orden' => 3, 'clave' => 'CRV-M-MG-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 166
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 25, 'proceso_id' => 167, 'orden' => 4, 'clave' => 'CRV-C-MG-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 167
            //}
            
            //Hombros HB {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 26, 'proceso_id' => 168, 'orden' => 1, 'clave' => 'CRV-C-HB-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 168
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 26, 'proceso_id' => 169, 'orden' => 2, 'clave' => 'CRV-C-HB-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 169
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 26, 'proceso_id' => 170, 'orden' => 3, 'clave' => 'CRV-M-HB-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 170
            //}

            //Cuello / Pie cuello PC {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 27, 'proceso_id' => 171, 'orden' => 1, 'clave' => 'CRV-F-PC-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 171
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 27, 'proceso_id' => 172, 'orden' => 2, 'clave' => 'CRV-C-PC-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 172
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 27, 'proceso_id' => 173, 'orden' => 3, 'clave' => 'CRV-M-PC-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 173
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 27, 'proceso_id' => 174, 'orden' => 4, 'clave' => 'CRV-C-PC-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 174
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 27, 'proceso_id' => 175, 'orden' => 5, 'clave' => 'CRV-C-PC-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 175
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 27, 'proceso_id' => 176, 'orden' => 6, 'clave' => 'CRV-C-PC-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 176
            //}

            //Puños PÑ {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 28, 'proceso_id' => 177, 'orden' => 1, 'clave' => 'CRV-F-PÑ-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 177
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 28, 'proceso_id' => 178, 'orden' => 2, 'clave' => 'CRV-M-PÑ-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 178
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 28, 'proceso_id' => 179, 'orden' => 3, 'clave' => 'CRV-C-PÑ-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 179
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 28, 'proceso_id' => 180, 'orden' => 4, 'clave' => 'CRV-M-PÑ-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 180
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 28, 'proceso_id' => 181, 'orden' => 5, 'clave' => 'CRV-C-PÑ-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 181
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 28, 'proceso_id' => 182, 'orden' => 6, 'clave' => 'CRV-P-PÑ-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 182
            //}

            //Cuerpo CU {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 183, 'orden' => 1, 'clave' => 'CRV-C-CU-01', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 183
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 184, 'orden' => 2, 'clave' => 'CRV-C-CU-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 184
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 185, 'orden' => 3, 'clave' => 'CRV-C-CU-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 185
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 186, 'orden' => 4, 'clave' => 'CRV-M-CU-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 186
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 187, 'orden' => 5, 'clave' => 'CRV-M-CU-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 187
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 188, 'orden' => 6, 'clave' => 'CRV-C-CU-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 188
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 189, 'orden' => 7, 'clave' => 'CRV-M-CU-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 189
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 190, 'orden' => 8, 'clave' => 'CRV-P-CU-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 190
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 191, 'orden' => 9, 'clave' => 'CRV-M-CU-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 191
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 29, 'proceso_id' => 192, 'orden' => 10, 'clave' => 'CRV-M-CU-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 192
            //}
        //}
    }
}