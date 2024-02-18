<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alias' => $this->faker->word,
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'reference' => $this->faker->optional()->text(5), 
            'is_active' => $this->faker->boolean,
            'users_id' => \App\Models\User::all()->random()->id,
        ];
    }
}
