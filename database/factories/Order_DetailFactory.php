<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_Detail>
 */
class Order_DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subtotal' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomNumber(1),

            'orders_id' => \App\Models\Order::all()->random()->id,
            'products_id' =>  \App\Models\Product::all()->random()->id,
        ];
    }
}
