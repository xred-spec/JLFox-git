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
            // Delantero - DT {
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
            //}

            // Mangas - MG {
                Proceso::firstOrCreate(['descripcion' => 'Unir manga', 'area' => 'costura']); //id: 14
                Proceso::firstOrCreate(['descripcion' => 'Mangas Abrir costuras, fusion y bastilla', 'area' => 'plancha']); //id: 15
                Proceso::firstOrCreate(['descripcion' => 'Manga Empalmar forro con manga', 'area' => 'manual']); //id: 16
                Proceso::firstOrCreate(['descripcion' => 'Manga Union de forro con manga y fusion', 'area' => 'costura']); //id: 17
                Proceso::firstOrCreate(['descripcion' => 'Manga volteado, fusion y puño', 'area' => 'plancha']); //id: 18
            //}

            // Cartera - CA {
                Proceso::firstOrCreate(['descripcion' => 'Cartera inicio fusion', 'area' => 'fusion']); //id: 19
                Proceso::firstOrCreate(['descripcion' => 'Cartera rayar', 'area' => 'manual']); //id: 20
                Proceso::firstOrCreate(['descripcion' => 'Cartera cortar y coser', 'area' => 'costura']); //id: 21
                Proceso::firstOrCreate(['descripcion' => 'Cartera voltearla', 'area' => 'manual']); //id: 22
                Proceso::firstOrCreate(['descripcion' => 'Cartera pespunte', 'area' => 'costura']); //id: 23
                Proceso::firstOrCreate(['descripcion' => 'Cartera rayar final', 'area' => 'manual']); //id: 24
            //}

            // Bata - BT {
                Proceso::firstOrCreate(['descripcion' => 'Bata fusion espalda y delantero', 'area' => 'fusion']); //id: 25
                Proceso::firstOrCreate(['descripcion' => 'Bata emparejar talla y tono', 'area' => 'manual']); //id: 26
            //}

            // Espalda - EP {
                Proceso::firstOrCreate(['descripcion' => 'Unir espalda', 'area' => 'costura']); //id: 27
                Proceso::firstOrCreate(['descripcion' => 'Espalda Abrir costuras', 'area' => 'plancha']); //id: 28
                Proceso::firstOrCreate(['descripcion' => 'Espalda Fusionar y bastilla', 'area' => 'fusion']); //id: 29
                Proceso::firstOrCreate(['descripcion' => 'Espalda Rayar la espalda (vivos)', 'area' => 'manual']); //id: 30
                Proceso::firstOrCreate(['descripcion' => 'Unir vivos de espalda', 'area' => 'costura']); //id: 31
                Proceso::firstOrCreate(['descripcion' => 'Espalda Abrir vivos', 'area' => 'manual']); //id: 32
                Proceso::firstOrCreate(['descripcion' => 'Espalda Cierre de vivos', 'area' => 'costura']); //id: 33
                Proceso::firstOrCreate(['descripcion' => 'Espalda planchar vivos', 'area' => 'plancha']); //id: 34
                Proceso::firstOrCreate(['descripcion' => 'Bata union espalda', 'area' => 'costura']); //id: 35
            //}

            // Cuello / Tapa - CT {
                Proceso::firstOrCreate(['descripcion' => 'Cuello/tapa fusion', 'area' => 'fusion']); //id: 36
                Proceso::firstOrCreate(['descripcion' => 'Cuello unir tapa/cuello y rayado', 'area' => 'manual']); //id: 37
                Proceso::firstOrCreate(['descripcion' => 'Cuello filo unir con tapa', 'area' => 'costura']); //id: 38
                Proceso::firstOrCreate(['descripcion' => 'Cuello abren costuras', 'area' => 'plancha']); //id: 39
                Proceso::firstOrCreate(['descripcion' => 'Cuello voltear', 'area' => 'manual']); //id: 40
                Proceso::firstOrCreate(['descripcion' => 'Cuello planchar despues de voltear', 'area' => 'plancha']); //id: 41
                Proceso::firstOrCreate(['descripcion' => 'Cuello rayar con molde', 'area' => 'manual']); //id: 42
                Proceso::firstOrCreate(['descripcion' => 'Cuello bastilla', 'area' => 'costura']); //id: 43
            //}

            // Vista - VS {
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
            //}

            // Cuerpo - CU {
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
            //}

            // Saco - SC {
                Proceso::firstOrCreate(['descripcion' => 'Saco marcar ojal y boton', 'area' => 'manual']); //id: 68
                Proceso::firstOrCreate(['descripcion' => 'Saco ojal', 'area' => 'manual']); //id: 69
                Proceso::firstOrCreate(['descripcion' => 'Saco boton', 'area' => 'manual']); //id: 70
                Proceso::firstOrCreate(['descripcion' => 'Saco deshebrar', 'area' => 'manual']); //id: 71
                Proceso::firstOrCreate(['descripcion' => 'Saco plancha final', 'area' => 'plancha']); //id: 72
                Proceso::firstOrCreate(['descripcion' => 'Saco etiqueta y cubrepolvo', 'area' => 'manual']); //id: 73
            //}
        //}

        //Pantalón {
            //Trasero - TS {
                Proceso::firstOrCreate(['descripcion' => 'Pinza trasera', 'area' => 'costura']); //id: 74
                Proceso::firstOrCreate(['descripcion' => 'Sobrehilado', 'area' => 'costura']); //id: 75
                Proceso::firstOrCreate(['descripcion' => 'Plancha pinza trasera', 'area' => 'plancha']); //id:76
                Proceso::firstOrCreate(['descripcion' => 'Rayado bolsa trasera', 'area' => 'manual']); //id:77
                Proceso::firstOrCreate(['descripcion' => 'Vivos y bolsa trasera', 'area' => 'costura']); //id: 78
                Proceso::firstOrCreate(['descripcion' => 'Abrir bolsa trasera', 'area' => 'manual']); //id: 79
                Proceso::firstOrCreate(['descripcion' => 'Fusion cartera bolsa trasera', 'area' => 'fusion']); //id: 80
                Proceso::firstOrCreate(['descripcion' => 'Segundo rayado bolsa trasera', 'area' => 'manual']); //id: 81
                Proceso::firstOrCreate(['descripcion' => 'Costura bolsa trasera', 'area' => 'costura']); // id: 82
                Proceso::firstOrCreate(['descripcion' => 'Voltear cartera trasera', 'area' => 'manual']); //id: 83
                Proceso::firstOrCreate(['descripcion' => 'Pespunte de cartera', 'area' => 'costura']); //id:84
                Proceso::firstOrCreate(['descripcion' => 'Rayar bastilla de cartera', 'area' => 'manual']); //id: 85
                Proceso::firstOrCreate(['descripcion' => 'Pegar botón cartera', 'area' => 'manual']); //id: 86
                Proceso::firstOrCreate(['descripcion' => 'Terminación bolsa trasera', 'area' => 'costura']); // id: 87
            //}

            //Delantero - DT {
                Proceso::firstOrCreate(['descripcion' => 'Vista y contravista unión con manta bolsa delantera', 'area' => 'costura']); //id: 88
                Proceso::firstOrCreate(['descripcion' => 'Unión bolsa con delantero', 'area' => 'costura']); //id: 89
                Proceso::firstOrCreate(['descripcion' => 'Voltear bolsa delantera', 'area' => 'manual']); //id: 90
                Proceso::firstOrCreate(['descripcion' => 'Pespunte bolsa delantera', 'area' => 'costura']); //id: 91
                Proceso::firstOrCreate(['descripcion' => 'Terminación bolsa delantera', 'area' => 'costura']); //id: 92
                Proceso::firstOrCreate(['descripcion' => 'Costura pasador', 'area' => 'costura']); //id: 93
                Proceso::firstOrCreate(['descripcion' => 'Voltear pasador', 'area' => 'manual']); //id: 94
                Proceso::firstOrCreate(['descripcion' => 'Plancha pasador', 'area' => 'plancha']); //id: 95
                Proceso::firstOrCreate(['descripcion' => 'Pespunte pasador', 'area' => 'costura']); //id: 96
                Proceso::firstOrCreate(['descripcion' => 'Sobrehilado delantero', 'area' => 'costura']); //id: 97
                Proceso::firstOrCreate(['descripcion' => 'Fusion ojalera', 'area' => 'fusion']); //id: 98
                Proceso::firstOrCreate(['descripcion' => 'Pegar cierre, forro y botella', 'area' => 'costura']); //id: 99
                Proceso::firstOrCreate(['descripcion' => 'Unión ojalera y delantero', 'area' => 'costura']); //id: 100
                Proceso::firstOrCreate(['descripcion' => 'Unión delantero y trasero', 'area' => 'costura']); //id: 101
            //}

            //Pretina - PR {
                Proceso::firstOrCreate(['descripcion' => 'Fusion pretina', 'area' => 'fusion']); //id: 102
                Proceso::firstOrCreate(['descripcion' => 'Pegar delantero y trasero ya unidos', 'area' => 'costura']); //id: 103
                Proceso::firstOrCreate(['descripcion' => 'Union dril', 'area' => 'costura']); //id: 104
                Proceso::firstOrCreate(['descripcion' => 'Planchado de pretina', 'area' => 'plancha']); //id: 105
                Proceso::firstOrCreate(['descripcion' => 'Pegado de broche', 'area' => 'manual']); //id: 106
                Proceso::firstOrCreate(['descripcion' => 'Terminación cuadro pantalón', 'area' => 'costura']); //id: 107
                Proceso::firstOrCreate(['descripcion' => 'Pespunte de pretina', 'area' => 'costura']); //id: 108
                Proceso::firstOrCreate(['descripcion' => 'Pegado de pasador', 'area' => 'costura']); //id: 109
            //}
        //}

        //Camisola flores {
            //Espalda EP {
                Proceso::firstOrCreate(['descripcion' => 'Unión etiqueta marca y talla', 'area' => 'costura']); //id: 110
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata trasera', 'area' => 'costura']); //id: 111
            //}

            //Delantero DT {
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata', 'area' => 'costura']); //id: 112
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla mayor', 'area' => 'costura']); //id: 113
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla menor', 'area' => 'costura']); //id: 114
            //}

            //Mangas MG {
                Proceso::firstOrCreate(['descripcion' => 'Pegado flecha', 'area' => 'costura']); //id: 115
                Proceso::firstOrCreate(['descripcion' => 'Terminacion diseño', 'area' => 'costura']); //id: 116
                Proceso::firstOrCreate(['descripcion' => 'Refilar flecha', 'area' => 'manual']); //id: 117
                Proceso::firstOrCreate(['descripcion' => 'Unión cuerpo y mangas', 'area' => 'costura']); //id: 118
            //}

            //Hombros HB {
                Proceso::firstOrCreate(['descripcion' => 'Union delanteros y espalda en hombros', 'area' => 'costura']); //id: 119
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros', 'area' => 'costura']); //id: 120
                Proceso::firstOrCreate(['descripcion' => 'Empalmar cuerpo y mangas', 'area' => 'manual']); //id: 121
            //}

            //Cuello / Pie cuello PC {
                Proceso::firstOrCreate(['descripcion' => 'Fusion pie de cuello y cuello', 'area' => 'fusion']); //id: 122
                Proceso::firstOrCreate(['descripcion' => 'Costura cuello', 'area' => 'costura']); //id: 123
                Proceso::firstOrCreate(['descripcion' => 'Voltear cuello', 'area' => 'manual']); //id: 124
                Proceso::firstOrCreate(['descripcion' => 'Pespunte cuello', 'area' => 'costura']); //id: 125
                Proceso::firstOrCreate(['descripcion' => 'Unión cuello y cuerpo', 'area' => 'costura']); //id: 126
                Proceso::firstOrCreate(['descripcion' => 'Terminación union cuello con pespunte', 'area' => 'costura']); //id: 127
            //}

            //Puños PÑ {
                Proceso::firstOrCreate(['descripcion' => 'Fusión puños', 'area' => 'fusion']); //id: 128
                Proceso::firstOrCreate(['descripcion' => 'Rayado puño', 'area' => 'manual']); //id: 129
                Proceso::firstOrCreate(['descripcion' => 'Pespunte puño', 'area' => 'costura']); //id: 130
                Proceso::firstOrCreate(['descripcion' => 'Unión con tapa', 'area' => 'manual']); //id: 131
                Proceso::firstOrCreate(['descripcion' => 'Pespunte costura', 'area' => 'costura']); //id: 132
                Proceso::firstOrCreate(['descripcion' => 'Planchado puño', 'area' => 'plancha']); //id: 133
            //}

            //Cuerpo CU {
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros cuerpo', 'area' => 'costura']); //id: 134
                Proceso::firstOrCreate(['descripcion' => 'Cierre de costados', 'area' => 'costura']); //id: 135
                Proceso::firstOrCreate(['descripcion' => 'Colocacion puños en mangas', 'area' => 'costura']); //id: 136
                Proceso::firstOrCreate(['descripcion' => 'Marcado de boton', 'area' => 'manual']); //id: 137
                Proceso::firstOrCreate(['descripcion' => 'Colocado botón', 'area' => 'manual']); //id: 138
                Proceso::firstOrCreate(['descripcion' => 'Bastilla cuerpo', 'area' => 'costura']); //id: 139
                Proceso::firstOrCreate(['descripcion' => 'Deshebrado cuerpo', 'area' => 'manual']); //id: 140
                Proceso::firstOrCreate(['descripcion' => 'Planchado cuerpo', 'area' => 'plancha']); //id: 141
                Proceso::firstOrCreate(['descripcion' => 'Doblado y colocacion alfiler', 'area' => 'manual']); //id: 142
                Proceso::firstOrCreate(['descripcion' => 'Etiqueta y cubrepolvo', 'area' => 'manual']); //id: 143
            //}
        //}

        //Camisa rodeo con vivos {
            //Bata delantera BD {
                Proceso::firstOrCreate(['descripcion' => 'Union batas dalanteras con vivos', 'area' => 'costura']); //id: 144
                Proceso::firstOrCreate(['descripcion' => 'Pespunte vivos BD', 'area' => 'costura']); //id: 145
            //}

            //Bata trasera BT {
                Proceso::firstOrCreate(['descripcion' => 'Union batas traseras con vivos', 'area' => 'costura']); //id: 146
                Proceso::firstOrCreate(['descripcion' => 'Pespunte vivos BT', 'area' => 'costura']); //id: 147
            //}

            //Delantero DT {
                Proceso::firstOrCreate(['descripcion' => 'Marcado vivos', 'area' => 'manual']); //id: 148
                Proceso::firstOrCreate(['descripcion' => 'Union vivos al delantero', 'area' => 'costura']); //id: 149
                Proceso::firstOrCreate(['descripcion' => 'Picado vivos abrir costura', 'area' => 'manual']); //id: 150
                Proceso::firstOrCreate(['descripcion' => 'Cierre vivos bolsa/cartera', 'area' => 'costura']); //id: 151
                Proceso::firstOrCreate(['descripcion' => 'Pegado bata delantero', 'area' => 'costura']); //id: 152
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata CRV', 'area' => 'costura']); //id: 153
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla mayor CRV', 'area' => 'costura']); //id: 154
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla menor CRV', 'area' => 'costura']); //id: 155
            //}

            //Espalda EP {
                Proceso::firstOrCreate(['descripcion' => 'Unión etiqueta marca y talla CRV', 'area' => 'costura']); //id: 156
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata trasera CRV', 'area' => 'costura']); //id: 157
            //}

            //Cartera CA {
                Proceso::firstOrCreate(['descripcion' => 'Fusionado cartera', 'area' => 'fusion']); //id: 158
                Proceso::firstOrCreate(['descripcion' => 'Rayado cartera', 'area' => 'manual']); //id: 159
                Proceso::firstOrCreate(['descripcion' => 'Costura refilado cartera', 'area' => 'costura']); //id: 160
                Proceso::firstOrCreate(['descripcion' => 'Volteo cartera', 'area' => 'manual']); //id: 161
                Proceso::firstOrCreate(['descripcion' => 'Planchado cartera', 'area' => 'plancha']); //id: 162
                Proceso::firstOrCreate(['descripcion' => 'Rayado bastilla cartera', 'area' => 'manual']); //id: 163
            //}

            //Mangas MG {
                Proceso::firstOrCreate(['descripcion' => 'Pegado flecha CRV', 'area' => 'costura']); //id: 164
                Proceso::firstOrCreate(['descripcion' => 'Terminacion diseño CRV', 'area' => 'costura']); //id: 165
                Proceso::firstOrCreate(['descripcion' => 'Refilar flecha CRV', 'area' => 'manual']); //id: 166
                Proceso::firstOrCreate(['descripcion' => 'Unión cuerpo y mangas CRV', 'area' => 'costura']); //id: 167
            //}

            //Hombros HB {            
                Proceso::firstOrCreate(['descripcion' => 'Union delanteros y espalda en hombros CRV', 'area' => 'costura']); //id: 168
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros CRV', 'area' => 'costura']); //id: 169
                Proceso::firstOrCreate(['descripcion' => 'Empalmar cuerpo y mangas CRV', 'area' => 'manual']); //id: 170
            //}

            //Cuello / Pie cuello PC {
                Proceso::firstOrCreate(['descripcion' => 'Fusion pie de cuello y cuello CRV', 'area' => 'fusion']); //id: 171
                Proceso::firstOrCreate(['descripcion' => 'Costura cuello CRV', 'area' => 'costura']); //id: 172
                Proceso::firstOrCreate(['descripcion' => 'Voltear cuello CRV', 'area' => 'manual']); //id: 173
                Proceso::firstOrCreate(['descripcion' => 'Pespunte cuello CRV', 'area' => 'costura']); //id: 174
                Proceso::firstOrCreate(['descripcion' => 'Unión cuello y cuerpo CRV', 'area' => 'costura']); //id: 175
                Proceso::firstOrCreate(['descripcion' => 'Terminación union cuello con pespunte CRV', 'area' => 'costura']); //id: 176
            //}

            //Puños PÑ {
                Proceso::firstOrCreate(['descripcion' => 'Fusión puños CRV', 'area' => 'fusion']); //id: 177
                Proceso::firstOrCreate(['descripcion' => 'Rayado puño CRV', 'area' => 'manual']); //id: 178
                Proceso::firstOrCreate(['descripcion' => 'Pespunte puño CRV', 'area' => 'costura']); //id: 179
                Proceso::firstOrCreate(['descripcion' => 'Unión con tapa CRV', 'area' => 'manual']); //id: 180
                Proceso::firstOrCreate(['descripcion' => 'Pespunte costura CRV', 'area' => 'costura']); //id: 181
                Proceso::firstOrCreate(['descripcion' => 'Planchado puño CRV', 'area' => 'plancha']); //id: 182
            //}

            //Cuerpo CU {
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros cuerpo CRV', 'area' => 'costura']); //id: 183
                Proceso::firstOrCreate(['descripcion' => 'Cierre de costados CRV', 'area' => 'costura']); //id: 184
                Proceso::firstOrCreate(['descripcion' => 'Colocacion puños en mangas CRV', 'area' => 'costura']); //id: 185
                Proceso::firstOrCreate(['descripcion' => 'Marcado de boton CRV', 'area' => 'manual']); //id: 186
                Proceso::firstOrCreate(['descripcion' => 'Colocado botón CRV', 'area' => 'manual']); //id: 187
                Proceso::firstOrCreate(['descripcion' => 'Bastilla cuerpo CRV', 'area' => 'costura']); //id: 188
                Proceso::firstOrCreate(['descripcion' => 'Deshebrado cuerpo CRV', 'area' => 'manual']); //id: 189
                Proceso::firstOrCreate(['descripcion' => 'Planchado cuerpo CRV', 'area' => 'plancha']); //id: 190
                Proceso::firstOrCreate(['descripcion' => 'Doblado y colocacion alfiler CRV', 'area' => 'manual']); //id: 191
                Proceso::firstOrCreate(['descripcion' => 'Etiqueta y cubrepolvo CRV', 'area' => 'manual']); //id: 192
            //}
        //}
    }
}
