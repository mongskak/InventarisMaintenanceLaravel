<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'kode'  => $this->faker->name, // faker number
            'product_id' => Products::factory(),
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'reason' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Pending', 'Solved', 'OnProgress']),
            'priority' => $this->faker->randomElement(['High', 'Medium', 'Low']),
            // Add more attributes as needed for your Eloquent model. For example,
            //
        ];
    }
}
