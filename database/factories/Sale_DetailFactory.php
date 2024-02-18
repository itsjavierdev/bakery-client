<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale_Detail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Sale_DetailFactory extends Factory
{

    protected $model = Sale_Detail::class;
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

            'sales_id' => \App\Models\Sale::all()->random()->id,
            'products_id' =>  \App\Models\Product::all()->random()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Fecha aleatoria en el último año
        ];
    }
}
