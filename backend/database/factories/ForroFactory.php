<?php

namespace Database\Factories;

use App\Models\Forro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Forro>
 */
class ForroFactory extends Factory
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
