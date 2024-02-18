<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    protected $model = Sale::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total' => $this->faker->randomNumber(3),
            'total_quantity' => $this->faker->randomNumber(2),
            'payment' => $this->faker->randomElement(['card', 'cash']),

            'users_id' => \App\Models\User::all()->random()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Fecha aleatoria en el último año
        ];
    }
}
