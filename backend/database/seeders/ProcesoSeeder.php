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
                Proceso::firstOrCreate(['descripcion' => 'Unir delantero con costadillo', 'area_id' => 2]); //id: 1
                Proceso::firstOrCreate(['descripcion' => 'Delantero Abrir costuras', 'area_id' => 3]); //id: 2
                Proceso::firstOrCreate(['descripcion' => 'Delantero Fusionar', 'area_id' => 4]); //id: 3
                Proceso::firstOrCreate(['descripcion' => 'Delantero Rayar la bolsa y vivos', 'area_id' => 1]); //id: 4
                Proceso::firstOrCreate(['descripcion' => 'Unir vivos de delantero', 'area_id' => 2]); //id: 5
                Proceso::firstOrCreate(['descripcion' => 'Delantero Abrir vivos', 'area_id' => 1]); //id: 6
                Proceso::firstOrCreate(['descripcion' => 'Delantero cierre vivos y bolsa (cartera)', 'area_id' => 2]); //id: 7
                Proceso::firstOrCreate(['descripcion' => 'Delantero planchar vivos y bolsa', 'area_id' => 3]); //id: 8 --ht
                Proceso::firstOrCreate(['descripcion' => 'Bata delantero', 'area_id' => 2]); //id: 9
                Proceso::firstOrCreate(['descripcion' => 'Delantero limpiar rayar bastilla', 'area_id' => 1]); //id: 10
                Proceso::firstOrCreate(['descripcion' => 'Delantero y vista se empalman', 'area_id' => 1]); //id: 11
                Proceso::firstOrCreate(['descripcion' => 'Delantero filo', 'area_id' => 2]); //id: 12
                Proceso::firstOrCreate(['descripcion' => 'Delantero refilar forro', 'area_id' => 1]); //id: 13
            //}

            // Mangas - MG {
                Proceso::firstOrCreate(['descripcion' => 'Unir manga', 'area_id' => 2]); //id: 14
                Proceso::firstOrCreate(['descripcion' => 'Mangas Abrir costuras, fusion y bastilla', 'area_id' => 3]); //id: 15
                Proceso::firstOrCreate(['descripcion' => 'Manga Empalmar forro con manga', 'area_id' => 1]); //id: 16 --ht
                Proceso::firstOrCreate(['descripcion' => 'Manga Union de forro con manga y fusion', 'area_id' => 2]); //id: 17
                Proceso::firstOrCreate(['descripcion' => 'Manga volteado, fusion y puño', 'area_id' => 3]); //id: 18
            //}

            // Cartera - CA {
                Proceso::firstOrCreate(['descripcion' => 'Cartera inicio fusion', 'area_id' => 4]); //id: 19
                Proceso::firstOrCreate(['descripcion' => 'Cartera rayar', 'area_id' => 1]); //id: 20
                Proceso::firstOrCreate(['descripcion' => 'Cartera cortar y coser', 'area_id' => 2]); //id: 21
                Proceso::firstOrCreate(['descripcion' => 'Cartera voltearla', 'area_id' => 1]); //id: 22
                Proceso::firstOrCreate(['descripcion' => 'Cartera pespunte', 'area_id' => 2]); //id: 23
                Proceso::firstOrCreate(['descripcion' => 'Cartera rayar final', 'area_id' => 1]); //id: 24
            //}

            // Bata - BT {
                Proceso::firstOrCreate(['descripcion' => 'Bata fusion espalda y delantero', 'area_id' => 4]); //id: 25
                Proceso::firstOrCreate(['descripcion' => 'Bata emparejar talla y tono', 'area_id' => 1]); //id: 26
            //}

            // Espalda - EP {
                Proceso::firstOrCreate(['descripcion' => 'Unir espalda', 'area_id' => 2]); //id: 27
                Proceso::firstOrCreate(['descripcion' => 'Espalda Abrir costuras', 'area_id' => 3]); //id: 28 --ht
                Proceso::firstOrCreate(['descripcion' => 'Espalda Fusionar y bastilla', 'area_id' => 4]); //id: 29
                Proceso::firstOrCreate(['descripcion' => 'Espalda Rayar la espalda (vivos)', 'area_id' => 1]); //id: 30
                Proceso::firstOrCreate(['descripcion' => 'Unir vivos de espalda', 'area_id' => 2]); //id: 31
                Proceso::firstOrCreate(['descripcion' => 'Espalda Abrir vivos', 'area_id' => 1]); //id: 32
                Proceso::firstOrCreate(['descripcion' => 'Espalda Cierre de vivos', 'area_id' => 2]); //id: 33
                Proceso::firstOrCreate(['descripcion' => 'Espalda planchar vivos', 'area_id' => 3]); //id: 34
                Proceso::firstOrCreate(['descripcion' => 'Bata union espalda', 'area_id' => 2]); //id: 35
            //}

            // Cuello / Tapa - CT {
                Proceso::firstOrCreate(['descripcion' => 'Cuello/tapa fusion', 'area_id' => 4]); //id: 36
                Proceso::firstOrCreate(['descripcion' => 'Cuello unir tapa/cuello y rayado', 'area_id' => 1]); //id: 37
                Proceso::firstOrCreate(['descripcion' => 'Cuello filo unir con tapa', 'area_id' => 2]); //id: 38
                Proceso::firstOrCreate(['descripcion' => 'Cuello abren costuras', 'area_id' => 3]); //id: 39 --ht
                Proceso::firstOrCreate(['descripcion' => 'Cuello voltear', 'area_id' => 1]); //id: 40
                Proceso::firstOrCreate(['descripcion' => 'Cuello planchar despues de voltear', 'area_id' => 3]); //id: 41 --ht
                Proceso::firstOrCreate(['descripcion' => 'Cuello rayar con molde', 'area_id' => 1]); //id: 42
                Proceso::firstOrCreate(['descripcion' => 'Cuello bastilla', 'area_id' => 2]); //id: 43
            //}

            // Vista - VS {
                Proceso::firstOrCreate(['descripcion' => 'Vista fusion', 'area_id' => 4]); //id: 44
                Proceso::firstOrCreate(['descripcion' => 'Vista empalmar con forro', 'area_id' => 1]); //id: 45
                Proceso::firstOrCreate(['descripcion' => 'Vista y forro se unen y pespunte de forro', 'area_id' => 2]); //id: 46
                Proceso::firstOrCreate(['descripcion' => 'Vista rayar para vivo', 'area_id' => 1]); //id: 47
                Proceso::firstOrCreate(['descripcion' => 'Vista vivos', 'area_id' => 2]); //id: 48
                Proceso::firstOrCreate(['descripcion' => 'Vista abrir vivos', 'area_id' => 1]); //id: 49
                Proceso::firstOrCreate(['descripcion' => 'Vista cerrar vivos y poner bolsa', 'area_id' => 2]); //id: 50
                Proceso::firstOrCreate(['descripcion' => 'Vista poner etiqueta', 'area_id' => 2]); //id: 51
                Proceso::firstOrCreate(['descripcion' => 'Vista abrir costuras', 'area_id' => 3]); //id: 52
                Proceso::firstOrCreate(['descripcion' => 'Vista CIERRE union de fusion', 'area_id' => 2]); //id: 53
            //}

            // Cuerpo - CU {
                Proceso::firstOrCreate(['descripcion' => 'Empalmar espalda delantero y forro', 'area_id' => 1]); //id: 54
                Proceso::firstOrCreate(['descripcion' => 'Espalda y delantero union', 'area_id' => 2]); //id: 55
                Proceso::firstOrCreate(['descripcion' => 'Espalda y delantero abren costuras', 'area_id' => 3]); //id: 56 --ht
                Proceso::firstOrCreate(['descripcion' => 'Espalda y delantero hacer bastilla', 'area_id' => 3]); //id: 57 --ht
                Proceso::firstOrCreate(['descripcion' => 'Costura de hombros', 'area_id' => 2]); //id: 58
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo abrir costuras de hombros', 'area_id' => 3]); //id: 59 --ht
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo medir caja de cuello', 'area_id' => 1]); //id: 60
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo y cuello se unen', 'area_id' => 2]); //id: 61
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo pespunte', 'area_id' => 2]); //id: 62
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo fusion', 'area_id' => 3]); //id: 63
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo empalmar mangas y cuerpo', 'area_id' => 1]); //id: 64
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo unir mangas y cuerpo', 'area_id' => 2]); //id: 65
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo chorizo y hombrera', 'area_id' => 2]); //id: 66
                Proceso::firstOrCreate(['descripcion' => 'Cuerpo CIERRE', 'area_id' => 2]); //id: 67
            //}

            // Saco - SC {
                Proceso::firstOrCreate(['descripcion' => 'Saco marcar ojal y boton', 'area_id' => 1]); //id: 68
                Proceso::firstOrCreate(['descripcion' => 'Saco ojal', 'area_id' => 1]); //id: 69
                Proceso::firstOrCreate(['descripcion' => 'Saco boton', 'area_id' => 1]); //id: 70
                Proceso::firstOrCreate(['descripcion' => 'Saco deshebrar', 'area_id' => 1]); //id: 71
                Proceso::firstOrCreate(['descripcion' => 'Saco plancha final', 'area_id' => 3]); //id: 72 --ht
                Proceso::firstOrCreate(['descripcion' => 'Saco etiqueta y cubrepolvo', 'area_id' => 1]); //id: 73
            //}
        //}

        //Pantalón {
            //Trasero - TS {
                Proceso::firstOrCreate(['descripcion' => 'Pinza trasera', 'area_id' => 2]); //id: 74
                Proceso::firstOrCreate(['descripcion' => 'Sobrehilado', 'area_id' => 2]); //id: 75
                Proceso::firstOrCreate(['descripcion' => 'Plancha pinza trasera', 'area_id' => 3]); //id:76
                Proceso::firstOrCreate(['descripcion' => 'Rayado bolsa trasera', 'area_id' => 1]); //id:77
                Proceso::firstOrCreate(['descripcion' => 'Vivos y bolsa trasera', 'area_id' => 2]); //id: 78
                Proceso::firstOrCreate(['descripcion' => 'Abrir bolsa trasera', 'area_id' => 1]); //id: 79
                Proceso::firstOrCreate(['descripcion' => 'Fusion cartera bolsa trasera', 'area_id' => 4]); //id: 80
                Proceso::firstOrCreate(['descripcion' => 'Segundo rayado bolsa trasera', 'area_id' => 1]); //id: 81
                Proceso::firstOrCreate(['descripcion' => 'Costura bolsa trasera', 'area_id' => 2]); // id: 82
                Proceso::firstOrCreate(['descripcion' => 'Voltear cartera trasera', 'area_id' => 1]); //id: 83
                Proceso::firstOrCreate(['descripcion' => 'Pespunte de cartera', 'area_id' => 2]); //id:84
                Proceso::firstOrCreate(['descripcion' => 'Rayar bastilla de cartera', 'area_id' => 1]); //id: 85
                Proceso::firstOrCreate(['descripcion' => 'Pegar botón cartera', 'area_id' => 1]); //id: 86
                Proceso::firstOrCreate(['descripcion' => 'Terminación bolsa trasera', 'area_id' => 2]); // id: 87
            //}

            //Delantero - DT {
                Proceso::firstOrCreate(['descripcion' => 'Vista y contravista unión con manta bolsa delantera', 'area_id' => 2]); //id: 88
                Proceso::firstOrCreate(['descripcion' => 'Unión bolsa con delantero', 'area_id' => 2]); //id: 89
                Proceso::firstOrCreate(['descripcion' => 'Voltear bolsa delantera', 'area_id' => 1]); //id: 90
                Proceso::firstOrCreate(['descripcion' => 'Pespunte bolsa delantera', 'area_id' => 2]); //id: 91
                Proceso::firstOrCreate(['descripcion' => 'Terminación bolsa delantera', 'area_id' => 2]); //id: 92
                Proceso::firstOrCreate(['descripcion' => 'Costura pasador', 'area_id' => 2]); //id: 93
                Proceso::firstOrCreate(['descripcion' => 'Voltear pasador', 'area_id' => 1]); //id: 94
                Proceso::firstOrCreate(['descripcion' => 'Plancha pasador', 'area_id' => 3]); //id: 95
                Proceso::firstOrCreate(['descripcion' => 'Pespunte pasador', 'area_id' => 2]); //id: 96
                Proceso::firstOrCreate(['descripcion' => 'Sobrehilado delantero', 'area_id' => 2]); //id: 97
                Proceso::firstOrCreate(['descripcion' => 'Fusion ojalera', 'area_id' => 4]); //id: 98
                Proceso::firstOrCreate(['descripcion' => 'Pegar cierre, forro y botella', 'area_id' => 2]); //id: 99
                Proceso::firstOrCreate(['descripcion' => 'Unión ojalera y delantero', 'area_id' => 2]); //id: 100
                Proceso::firstOrCreate(['descripcion' => 'Unión delantero y trasero', 'area_id' => 2]); //id: 101
            //}

            //Pretina - PR {
                Proceso::firstOrCreate(['descripcion' => 'Fusion pretina', 'area_id' => 4]); //id: 102
                Proceso::firstOrCreate(['descripcion' => 'Pegar delantero y trasero ya unidos', 'area_id' => 2]); //id: 103
                Proceso::firstOrCreate(['descripcion' => 'Union dril', 'area_id' => 2]); //id: 104
                Proceso::firstOrCreate(['descripcion' => 'Planchado de pretina', 'area_id' => 3]); //id: 105 --ht
                Proceso::firstOrCreate(['descripcion' => 'Pegado de broche', 'area_id' => 1]); //id: 106
                Proceso::firstOrCreate(['descripcion' => 'Terminación cuadro pantalón', 'area_id' => 2]); //id: 107
                Proceso::firstOrCreate(['descripcion' => 'Pespunte de pretina', 'area_id' => 2]); //id: 108
                Proceso::firstOrCreate(['descripcion' => 'Pegado de pasador', 'area_id' => 2]); //id: 109
            //}
        //}

        //Camisola flores {
            //Espalda EP {
                Proceso::firstOrCreate(['descripcion' => 'Unión etiqueta marca y talla', 'area_id' => 2]); //id: 110
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata trasera', 'area_id' => 2]); //id: 111 --ht
            //}

            //Delantero DT {
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata', 'area_id' => 2]); //id: 112
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla mayor', 'area_id' => 2]); //id: 113
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla menor', 'area_id' => 2]); //id: 114
            //}

            //Mangas MG {
                Proceso::firstOrCreate(['descripcion' => 'Pegado flecha', 'area_id' => 2]); //id: 115
                Proceso::firstOrCreate(['descripcion' => 'Terminacion diseño', 'area_id' => 2]); //id: 116
                Proceso::firstOrCreate(['descripcion' => 'Refilar flecha', 'area_id' => 1]); //id: 117
                Proceso::firstOrCreate(['descripcion' => 'Unión cuerpo y mangas', 'area_id' => 2]); //id: 118
            //}

            //Hombros HB {
                Proceso::firstOrCreate(['descripcion' => 'Union delanteros y espalda en hombros', 'area_id' => 2]); //id: 119
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros', 'area_id' => 2]); //id: 120
                Proceso::firstOrCreate(['descripcion' => 'Empalmar cuerpo y mangas', 'area_id' => 1]); //id: 121
            //}

            //Cuello / Pie cuello PC {
                Proceso::firstOrCreate(['descripcion' => 'Fusion pie de cuello y cuello', 'area_id' => 4]); //id: 122
                Proceso::firstOrCreate(['descripcion' => 'Costura cuello', 'area_id' => 2]); //id: 123
                Proceso::firstOrCreate(['descripcion' => 'Voltear cuello', 'area_id' => 1]); //id: 124
                Proceso::firstOrCreate(['descripcion' => 'Pespunte cuello', 'area_id' => 2]); //id: 125
                Proceso::firstOrCreate(['descripcion' => 'Unión cuello y cuerpo', 'area_id' => 2]); //id: 126
                Proceso::firstOrCreate(['descripcion' => 'Terminación union cuello con pespunte', 'area_id' => 2]); //id: 127
            //}

            //Puños PÑ {
                Proceso::firstOrCreate(['descripcion' => 'Fusión puños', 'area_id' => 4]); //id: 128
                Proceso::firstOrCreate(['descripcion' => 'Rayado puño', 'area_id' => 1]); //id: 129
                Proceso::firstOrCreate(['descripcion' => 'Pespunte puño', 'area_id' => 2]); //id: 130
                Proceso::firstOrCreate(['descripcion' => 'Unión con tapa', 'area_id' => 1]); //id: 131
                Proceso::firstOrCreate(['descripcion' => 'Pespunte costura', 'area_id' => 2]); //id: 132
                Proceso::firstOrCreate(['descripcion' => 'Planchado puño', 'area_id' => 3]); //id: 133
            //}

            //Cuerpo CU {
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros cuerpo', 'area_id' => 2]); //id: 134
                Proceso::firstOrCreate(['descripcion' => 'Cierre de costados', 'area_id' => 2]); //id: 135
                Proceso::firstOrCreate(['descripcion' => 'Colocacion puños en mangas', 'area_id' => 2]); //id: 136
                Proceso::firstOrCreate(['descripcion' => 'Marcado de boton', 'area_id' => 1]); //id: 137
                Proceso::firstOrCreate(['descripcion' => 'Colocado botón', 'area_id' => 1]); //id: 138
                Proceso::firstOrCreate(['descripcion' => 'Bastilla cuerpo', 'area_id' => 2]); //id: 139
                Proceso::firstOrCreate(['descripcion' => 'Deshebrado cuerpo', 'area_id' => 1]); //id: 140
                Proceso::firstOrCreate(['descripcion' => 'Planchado cuerpo', 'area_id' => 3]); //id: 141
                Proceso::firstOrCreate(['descripcion' => 'Doblado y colocacion alfiler', 'area_id' => 1]); //id: 142
                Proceso::firstOrCreate(['descripcion' => 'Etiqueta y cubrepolvo', 'area_id' => 1]); //id: 143
            //}
        //}

        //Camisa rodeo con vivos {
            //Bata delantera BD {
                Proceso::firstOrCreate(['descripcion' => 'Union batas dalanteras con vivos', 'area_id' => 2]); //id: 144
                Proceso::firstOrCreate(['descripcion' => 'Pespunte vivos BD', 'area_id' => 2]); //id: 145
            //}

            //Bata trasera BT {
                Proceso::firstOrCreate(['descripcion' => 'Union batas traseras con vivos', 'area_id' => 2]); //id: 146
                Proceso::firstOrCreate(['descripcion' => 'Pespunte vivos BT', 'area_id' => 2]); //id: 147
            //}

            //Delantero DT {
                Proceso::firstOrCreate(['descripcion' => 'Marcado vivos', 'area_id' => 1]); //id: 148
                Proceso::firstOrCreate(['descripcion' => 'Union vivos al delantero', 'area_id' => 2]); //id: 149
                Proceso::firstOrCreate(['descripcion' => 'Picado vivos abrir costura', 'area_id' => 1]); //id: 150
                Proceso::firstOrCreate(['descripcion' => 'Cierre vivos bolsa/cartera', 'area_id' => 2]); //id: 151
                Proceso::firstOrCreate(['descripcion' => 'Pegado bata delantero', 'area_id' => 2]); //id: 152
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata CRV', 'area_id' => 2]); //id: 153
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla mayor CRV', 'area_id' => 2]); //id: 154
                Proceso::firstOrCreate(['descripcion' => 'Costura letilla menor CRV', 'area_id' => 2]); //id: 155
            //}

            //Espalda EP {
                Proceso::firstOrCreate(['descripcion' => 'Unión etiqueta marca y talla CRV', 'area_id' => 2]); //id: 156
                Proceso::firstOrCreate(['descripcion' => 'Pegar bata trasera CRV', 'area_id' => 2]); //id: 157
            //}

            //Cartera CA {
                Proceso::firstOrCreate(['descripcion' => 'Fusionado cartera', 'area_id' => 4]); //id: 158
                Proceso::firstOrCreate(['descripcion' => 'Rayado cartera', 'area_id' => 1]); //id: 159
                Proceso::firstOrCreate(['descripcion' => 'Costura refilado cartera', 'area_id' => 2]); //id: 160
                Proceso::firstOrCreate(['descripcion' => 'Volteo cartera', 'area_id' => 1]); //id: 161
                Proceso::firstOrCreate(['descripcion' => 'Planchado cartera', 'area_id' => 3]); //id: 162
                Proceso::firstOrCreate(['descripcion' => 'Rayado bastilla cartera', 'area_id' => 1]); //id: 163
            //}

            //Mangas MG {
                Proceso::firstOrCreate(['descripcion' => 'Pegado flecha CRV', 'area_id' => 2]); //id: 164
                Proceso::firstOrCreate(['descripcion' => 'Terminacion diseño CRV', 'area_id' => 2]); //id: 165
                Proceso::firstOrCreate(['descripcion' => 'Refilar flecha CRV', 'area_id' => 1]); //id: 166
                Proceso::firstOrCreate(['descripcion' => 'Unión cuerpo y mangas CRV', 'area_id' => 2]); //id: 167
            //}

            //Hombros HB {            
                Proceso::firstOrCreate(['descripcion' => 'Union delanteros y espalda en hombros CRV', 'area_id' => 2]); //id: 168
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros CRV', 'area_id' => 2]); //id: 169
                Proceso::firstOrCreate(['descripcion' => 'Empalmar cuerpo y mangas CRV', 'area_id' => 1]); //id: 170
            //}

            //Cuello / Pie cuello PC {
                Proceso::firstOrCreate(['descripcion' => 'Fusion pie de cuello y cuello CRV', 'area_id' => 4]); //id: 171
                Proceso::firstOrCreate(['descripcion' => 'Costura cuello CRV', 'area_id' => 2]); //id: 172
                Proceso::firstOrCreate(['descripcion' => 'Voltear cuello CRV', 'area_id' => 1]); //id: 173
                Proceso::firstOrCreate(['descripcion' => 'Pespunte cuello CRV', 'area_id' => 2]); //id: 174
                Proceso::firstOrCreate(['descripcion' => 'Unión cuello y cuerpo CRV', 'area_id' => 2]); //id: 175
                Proceso::firstOrCreate(['descripcion' => 'Terminación union cuello con pespunte CRV', 'area_id' => 2]); //id: 176
            //}

            //Puños PÑ {
                Proceso::firstOrCreate(['descripcion' => 'Fusión puños CRV', 'area_id' => 4]); //id: 177
                Proceso::firstOrCreate(['descripcion' => 'Rayado puño CRV', 'area_id' => 1]); //id: 178
                Proceso::firstOrCreate(['descripcion' => 'Pespunte puño CRV', 'area_id' => 2]); //id: 179
                Proceso::firstOrCreate(['descripcion' => 'Unión con tapa CRV', 'area_id' => 1]); //id: 180
                Proceso::firstOrCreate(['descripcion' => 'Pespunte costura CRV', 'area_id' => 2]); //id: 181
                Proceso::firstOrCreate(['descripcion' => 'Planchado puño CRV', 'area_id' => 3]); //id: 182
            //}

            //Cuerpo CU {
                Proceso::firstOrCreate(['descripcion' => 'Pespunte hombros cuerpo CRV', 'area_id' => 2]); //id: 183
                Proceso::firstOrCreate(['descripcion' => 'Cierre de costados CRV', 'area_id' => 2]); //id: 184
                Proceso::firstOrCreate(['descripcion' => 'Colocacion puños en mangas CRV', 'area_id' => 2]); //id: 185
                Proceso::firstOrCreate(['descripcion' => 'Marcado de boton CRV', 'area_id' => 1]); //id: 186
                Proceso::firstOrCreate(['descripcion' => 'Colocado botón CRV', 'area_id' => 1]); //id: 187
                Proceso::firstOrCreate(['descripcion' => 'Bastilla cuerpo CRV', 'area_id' => 2]); //id: 188
                Proceso::firstOrCreate(['descripcion' => 'Deshebrado cuerpo CRV', 'area_id' => 1]); //id: 189
                Proceso::firstOrCreate(['descripcion' => 'Planchado cuerpo CRV', 'area_id' => 3]); //id: 190
                Proceso::firstOrCreate(['descripcion' => 'Doblado y colocacion alfiler CRV', 'area_id' => 1]); //id: 191
                Proceso::firstOrCreate(['descripcion' => 'Etiqueta y cubrepolvo CRV', 'area_id' => 1]); //id: 192
            //}
        //}
    }
}
