<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
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
            'description' => $this->faker->optional()->text(5), 
            'payment' => $this->faker->randomElement(['card', 'cash']),

            'users_id' => \App\Models\User::all()->random()->id,
            'addresses_id'=>\App\Models\Address::all()->random()->id,
        ];
    }
}
