<?php

namespace Database\Factories;

use App\Models\InventarioPrenda;
use App\Models\Prenda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InventarioPrenda>
 */
class InventarioPrendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad' => 1,
            'prenda_id' => Prenda::factory()
        ];
    }
}
