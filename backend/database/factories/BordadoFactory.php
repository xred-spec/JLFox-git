<?php

namespace Database\Factories;

use App\Models\Bordado;
use App\Models\ColorHilo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bordado>
 */
class BordadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'forma' => $this->faker->name(),
            'color_hilo_id' => ColorHilo::factory(),
            'created_at' => now(),
        ];
    }
}
