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
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 1, 'orden' => 1, 'clave' => 'SL-C-DT-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 1
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 2, 'orden' => 2, 'clave' => 'SL-P-DT-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 2
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 3, 'orden' => 3, 'clave' => 'SL-F-DT-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 3
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 4, 'orden' => 4, 'clave' => 'SL-M-DT-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 4
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 5, 'orden' => 5, 'clave' => 'SL-C-DT-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 5
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 6, 'orden' => 6, 'clave' => 'SL-M-DT-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 6
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 7, 'orden' => 7, 'clave' => 'SL-C-DT-08', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 7
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 8, 'orden' => 8, 'clave' => 'SL-P-DT-09', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 8
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 9, 'orden' => 9, 'clave' => 'SL-C-DT-10', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 9
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 10, 'orden' => 10, 'clave' => 'SL-M-DT-11', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 10
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 11, 'orden' => 11, 'clave' => 'SL-M-DT-12', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 11
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 12, 'orden' => 12, 'clave' => 'SL-C-DT-13', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 12
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 1, 'proceso_id' => 13, 'orden' => 13, 'clave' => 'SL-M-DT-14', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 13
            // }

            //Mangas - MG {
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 14, 'orden' => 1, 'clave' => 'SL-C-MG-02', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 14
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 15, 'orden' => 2, 'clave' => 'SL-P-MG-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 15
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 2, 'proceso_id' => 16, 'orden' => 3, 'clave' => 'SL-M-MG-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 16
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
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 5, 'proceso_id' => 28, 'orden' => 2, 'clave' => 'SL-P-EP-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 28
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
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 39, 'orden' => 4, 'clave' => 'SL-P-CT-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 39
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 40, 'orden' => 5, 'clave' => 'SL-M-CT-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 40
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 6, 'proceso_id' => 41, 'orden' => 6, 'clave' => 'SL-P-CT-07', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 41
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
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 56, 'orden' => 3, 'clave' => 'SL-P-CU-03', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 56
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 57, 'orden' => 4, 'clave' => 'SL-P-CU-04', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 57
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 58, 'orden' => 5, 'clave' => 'SL-C-CU-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 58
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 8, 'proceso_id' => 59, 'orden' => 6, 'clave' => 'SL-P-CU-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 59
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
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 72, 'orden' => 5, 'clave' => 'SL-P-SC-05', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 72
                PrendaProceso::firstOrCreate(['prenda_pieza_id' => 9, 'proceso_id' => 73, 'orden' => 6, 'clave' => 'SL-M-SC-06', 'tiempo_previsto_hora' => 0, 'tiempo_previsto_minuto' => 0, 'tiempo_previsto_segundo' => 0]); //id: 73
            // 
        //

        //Camisa {
            
        //
    }
}
