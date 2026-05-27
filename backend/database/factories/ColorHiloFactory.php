<?php

namespace Database\Factories;

use App\Models\ColorHilo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ColorHilo>
 */
class ColorHiloFactory extends Factory
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
            'created_at' => now(),
        ];
    }
}
