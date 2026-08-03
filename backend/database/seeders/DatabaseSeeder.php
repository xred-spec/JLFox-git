<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RolSeeder::class,
            UsuarioSeeder::class,
            TipoTelaSeeder::class,
            ColorTelaSeeder::class,
            TipoPrendaSeeder::class,
            ProcesoSeeder::class,
            PrendaPiezaSeeder::class,
            PrendaProcesoSeeder::class,
        ]);
    }
}
