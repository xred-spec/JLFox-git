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
            AreaProduccionSeeder::class,
            ProcesoSeeder::class,
            TipoTelaSeeder::class,
            TipoPrendaSeeder::class,
            UsuarioSeeder::class,
            ColorTelaSeeder::class,
            PrendaPiezaSeeder::class,
            PrendaProcesoSeeder::class,
        ]);
    }
}
