<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proceso;

class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Saco {
            // Delantero - DT
                Proceso::firstOrCreate(['descripcion' => 'Unir delantero con costadillo', 'area' => 'costura']); //id: 1
                Proceso::firstOrCreate(['descripcion' => 'Delantero Abrir costuras', 'area' => 'plancha']); //id: 2
                Proceso::firstOrCreate(['descripcion' => 'Delantero Fusionar', 'area' => 'fusion']); //id: 3
                Proceso::firstOrCreate(['descripcion' => 'Delantero Rayar la bolsa y vivos', 'area' => 'manual']); //id: 4
                Proceso::firstOrCreate(['descripcion' => 'Unir vivos de delantero', 'area' => 'costura']); //id: 5
                Proceso::firstOrCreate(['descripcion' => 'Delantero Abrir vivos', 'area' => 'manual']); //id: 6
                Proceso::firstOrCreate(['descripcion' => 'Delantero cierre vivos y bolsa (cartera)', 'area' => 'costura']); //id: 7
                Proceso::firstOrCreate(['descripcion' => 'Delantero planchar vivos y bolsa', 'area' => 'plancha']); //id: 8
                Proceso::firstOrCreate(['descripcion' => 'Bata delantero', 'area' => 'costura']); //id: 9
                Proceso::firstOrCreate(['descripcion' => 'Delantero limpiar rayar bastilla', 'area' => 'manual']); //id: 10
                Proceso::firstOrCreate(['descripcion' => 'Delantero y vista se empalman', 'area' => 'manual']); //id: 11
                Proceso::firstOrCreate(['descripcion' => 'Delantero filo', 'area' => 'costura']); //id: 12
                Proceso::firstOrCreate(['descripcion' => 'Delantero refilar forro', 'area' => 'manual']); //id: 13

            // Mangas - MG
                Proceso::firstOrCreate(['descripcion' => 'Unir manga', 'area' => 'costura']); //id: 14
                Proceso::firstOrCreate(['descripcion' => 'Mangas Abrir costuras, fusion y bastilla', 'area' => 'plancha']); //id: 15
                Proceso::firstOrCreate(['descripcion' => 'Manga Empalmar forro con manga', 'area' => 'manual']); //id: 16
                Proceso::firstOrCreate(['descripcion' => 'Manga Union de forro con manga y fusion', 'area' => 'costura']); //id: 17
                Proceso::firstOrCreate(['descripcion' => 'Manga volteado, fusion y puño', 'area' => 'plancha']); //id: 18

            // Cartera - CA
                Proceso::firstOrCreate(['descripcion' => 'Cartera inicio fusion', 'area' => 'fusion']); //id: 19
                Proceso::firstOrCreate(['descripcion' => 'Cartera rayar', 'area' => 'manual']); //id: 20
                Proceso::firstOrCreate(['descripcion' => 'Cartera cortar y coser', 'area' => 'costura']); //id: 21
                Proceso::firstOrCreate(['descripcion' => 'Cartera voltearla', 'area' => 'manual']); //id: 22
                Proceso::firstOrCreate(['descripcion' => 'Cartera pespunte', 'area' => 'costura']); //id: 23
                Proceso::firstOrCreate(['descripcion' => 'Cartera rayar final', 'area' => 'manual']); //id: 24

            // Bata - BT
                Proceso::firstOrCreate(['descripcion' => 'Bata fusion espalda y delantero', 'area' => 'fusion']); //id: 25
                Proceso::firstOrCreate(['descripcion' => 'Bata emparejar talla y tono', 'area' => 'manual']); //id: 26

            // Espalda - EP
                Proceso::firstOrCreate(['descripcion' => 'Unir espalda', 'area' => 'costura']); //id: 27
                Proceso::firstOrCreate(['descripcion' => 'Espalda Abrir costuras', 'area' => 'plancha']); //id: 28
                Proceso::firstOrCreate(['descripcion' => 'Espalda Fusionar y bastilla', 'area' => 'fusion']); //id: 29
                Proceso::firstOrCreate(['descripcion' => 'Espalda Rayar la espalda (vivos)', 'area' => 'manual']); //id: 30
                Proceso::firstOrCreate(['descripcion' => 'Unir vivos de espalda', 'area' => 'costura']); //id: 31
                Proceso::firstOrCreate(['descripcion' => 'Espalda Abrir vivos', 'area' => 'manual']); //id: 32
                Proceso::firstOrCreate(['descripcion' => 'Espalda Cierre de vivos', 'area' => 'costura']); //id: 33
                Proceso::firstOrCreate(['descripcion' => 'Espalda planchar vivos', 'area' => 'plancha']); //id: 34
                Proceso::firstOrCreate(['descripcion' => 'Bata union espalda', 'area' => 'costura']); //id: 35

            // Cuello / Tapa - CT
                Proceso::firstOrCreate(['descripcion' => 'Cuello/tapa fusion', 'area' => 'fusion']); //id: 36
                Proceso::firstOrCreate(['descripcion' => 'Cuello unir tapa/cuello y rayado', 'area' => 'manual']); //id: 37
                Proceso::firstOrCreate(['descripcion' => 'Cuello filo unir con tapa', 'area' => 'costura']); //id: 38
                Proceso::firstOrCreate(['descripcion' => 'Cuello abren costuras', 'area' => 'plancha']); //id: 39
                Proceso::firstOrCreate(['descripcion' => 'Cuello voltear', 'area' => 'manual']); //id: 40
                Proceso::firstOrCreate(['descripcion' => 'Cuello planchar despues de voltear', 'area' => 'plancha']); //id: 41
                Proceso::firstOrCreate(['descripcion' => 'Cuello rayar con molde', 'area' => 'manual']); //id: 42
                Proceso::firstOrCreate(['descripcion' => 'Cuello bastilla', 'area' => 'costura']); //id: 43

            // Vista - VS
                Proceso::firstOrCreate(['descripcion' => 'Vista fusion', 'area' => 'fusion']); //id: 44
                Proceso::firstOrCreate(['descripcion' => 'Vista empalmar con forro', 'area' => 'manual']); //id: 45
                Proceso::firstOrCreate(['descripcion' => 'Vista y forro se unen y pespunte de forro', 'area' => 'costura']); //id: 46
                Proceso::firstOrCreate(['descripcion' => 'Vista rayar para vivo', 'area' => 'manual']); //id: 47
                Proceso::firstOrCreate(['descripcion' => 'Vista vivos', 'area' => 'costura']); //id: 48
                Proceso::firstOrCreate(['descripcion' => 'Vista abrir vivos', 'area' => 'manual']); //id: 49
                Proceso::firstOrCreate(['descripcion' => 'Vista cerrar vivos y poner bolsa', 'area' => 'costura']); //id: 50
                Proceso::firstOrCreate(['descripcion' => 'Vista poner etiqueta', 'area' => 'costura']); //id: 51
                Proceso::firstOrCreate(['descripcion' => 'Vista abrir costuras', 'area' => 'plancha']); //id: 52
                Proceso::firstOrCreate(['descripcion' => 'Vista CIERRE union de fusion', 'area' => 'costura']); //id: 53

            // Cuerpo - CU
                Proceso::firstOrCreate(['descripcion' => 'Empalmar espalda delantero y forro', 'area' => 'manual']); //id: 54
                Proceso::firstOrCreate(['descripcion' => 'Espalda y delantero union', 'area' => 'costura']); //id: 55
                Proceso::firstOrCreate(['descripcion' => 'Espalda y delantero abren costuras', 'area' => 'plancha']); //id: 56
                Proceso::firstOrCreate(['descripcion' => 'Espalda y delantero hacer bastilla', 'area' => 'plancha']); //id: 57
                Proceso::firstOrCreate(['descripcion' => 'Costura de hombros', 'area' => 'costura']); //id: 58
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo abrir costiras de hombros', 'area' => 'plancha']); //id: 59
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo medir caja de cuello', 'area' => 'manual']); //id: 60
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo y cuello se unen', 'area' => 'costura']); //id: 61
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo pespunte', 'area' => 'costura']); //id: 62
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo fusion', 'area' => 'plancha']); //id: 63
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo empalmar mangas y cuerpo', 'area' => 'manual']); //id: 64
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo unir mangas y cuerpo', 'area' => 'costura']); //id: 65
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo chorizo y hombrera', 'area' => 'costura']); //id: 66
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo CIERRE', 'area' => 'costura']); //id: 67

            // Saco - SC
                Proceso::firstOrCreate(['descripcion' => 'Saco marcar ojal y boton', 'area' => 'manual']); //id: 68
                Proceso::firstOrCreate(['descripcion' => 'Saco ojal', 'area' => 'manual']); //id: 69
                Proceso::firstOrCreate(['descripcion' => 'Saco boton', 'area' => 'manual']); //id: 70
                Proceso::firstOrCreate(['descripcion' => 'Saco deshebrar', 'area' => 'manual']); //id: 71
                Proceso::firstOrCreate(['descripcion' => 'Saco plancha final', 'area' => 'plancha']); //id: 72
                Proceso::firstOrCreate(['descripcion' => 'Saco etiqueta y cubrepolvo', 'area' => 'manual']); //id: 73
        //}

        //Camisa {
        // }

        //Pantalón {
        // }
    }
}
