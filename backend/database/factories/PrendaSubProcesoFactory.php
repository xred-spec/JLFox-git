<?php

namespace Database\Factories;

use App\Models\PrendaSubProceso;
use App\Models\PrendaProceso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PrendaSubProceso>
 */
class PrendaSubProcesoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'prenda_proceso_id' => PrendaProceso::factory()
        ];
    }
}
