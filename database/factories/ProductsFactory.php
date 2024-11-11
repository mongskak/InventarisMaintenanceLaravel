<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(6, false),
            'description' => $this->faker->paragraph,
            'serial_number' => $this->faker->numberBetween(1000, 3345660),
            'kode' => $this->faker->numberBetween(1, 100),
            // Add more attributes as needed for your Eloquent model. For example,
            //
        ];
    }
}
