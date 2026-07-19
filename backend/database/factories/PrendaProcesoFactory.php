<?php

namespace Database\Factories;

use App\Models\PrendaProceso;
use App\Models\Prenda;
use App\Models\Proceso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PrendaProceso>
 */
class PrendaProcesoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prenda_id' => Prenda::factory(),
            'proceso_id' => Proceso::factory(),
            'orden' => 1
        ];
    }
}
