<?php

namespace Database\Factories;

use App\Models\PrendaLote;
use App\Models\Lote;
use App\Models\Prenda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PrendaLote>
 */
class PrendaLoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad_prevista' => 10,
            'cantidad_proceso' => null,
            'cantidad_final' => null,
            'proceso_actual' => null,
            'lote_id' => Lote::factory(),
            'prenda_id' => Prenda::factory()
        ];
    }
}
