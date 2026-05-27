<?php

namespace Database\Factories;

use App\Models\ColorTela;
use App\Models\Tela;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ColorTela>
 */
class ColorTelaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'color' => $this->faker->name(),
            'tela_id' => Tela::factory(),
            'created_at' => now(),
        ];
    }
}
