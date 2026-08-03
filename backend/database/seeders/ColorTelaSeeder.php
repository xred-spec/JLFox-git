<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ColorTela;

class ColorTelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tipo_tela: Royal , tela_id: 1
        ColorTela::firstOrCreate(['color' => 'Negro', 'tela_id' => 1]);
        ColorTela::firstOrCreate(['color' => 'Hueso', 'tela_id' => 1]);
        ColorTela::firstOrCreate(['color' => 'Oro', 'tela_id' => 1]);
        ColorTela::firstOrCreate(['color' => 'Choco', 'tela_id' => 1]);
        ColorTela::firstOrCreate(['color' => 'Gris', 'tela_id' => 1]);
        ColorTela::firstOrCreate(['color' => 'Vino', 'tela_id' => 1]);

        //tipo_tela: Poiester , tela_id: 2
        ColorTela::firstOrCreate(['color' => 'Negro', 'tela_id' => 2]);
        ColorTela::firstOrCreate(['color' => 'Choco', 'tela_id' => 2]);
        ColorTela::firstOrCreate(['color' => 'Beige', 'tela_id' => 2]);
        ColorTela::firstOrCreate(['color' => 'Plomo', 'tela_id' => 2]);
        ColorTela::firstOrCreate(['color' => 'Gris claro', 'tela_id' => 2]);
        ColorTela::firstOrCreate(['color' => 'Gris Oxford', 'tela_id' => 2]);
        ColorTela::firstOrCreate(['color' => 'Topo', 'tela_id' => 2]);

        //tipo_tela: Piel de durazno , tela_id: 3
        ColorTela::firstOrCreate(['color' => 'Negro', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Choco', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Ladrillo', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Topo', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Hueso', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Camel', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Gris', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Marino', 'tela_id' => 3]);
        ColorTela::firstOrCreate(['color' => 'Arena', 'tela_id' => 3]);

        //tipo_tela: Corazon y Flores , tela_id: 4
        ColorTela::firstOrCreate(['color' => 'Negro', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Choco', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Ladrillo', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Topo', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Hueso', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Camel', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Gris', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Marino', 'tela_id' => 4]);
        ColorTela::firstOrCreate(['color' => 'Arena', 'tela_id' => 4]);

        //tipo_tela: 65-35 , tela_id: 5
        ColorTela::firstOrCreate(['color' => 'Genérico', 'tela_id' => 5]);
    }
}
