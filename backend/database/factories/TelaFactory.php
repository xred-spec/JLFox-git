<?php

namespace Database\Factories;

use App\Models\Tela;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tela>
 */
class TelaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'created_at' => now(),
        ];
    }
}
