<?php

namespace Database\Factories;

use App\Models\Prenda;
use App\Models\TipoPrenda;
use App\Models\ColorTela;
use App\Models\Bordado;
use App\Models\Forro;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Prenda>
 */
class PrendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo' => 'adulto',
            'talla' => 36,
            'tiene_cartera' => true,
            'tipo_prenda_id' => TipoPrenda::factory(),
            'color_tela_id' => ColorTela::factory(),
            'bordado_id' => Bordado::factory(),
            'forro_id' => Forro::factory()
        ];
    }
}
