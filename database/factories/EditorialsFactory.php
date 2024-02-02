<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EditorialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Norma', 'IPEGA', 'Otro Editorial']),
            'location' => $this->faker->randomElement(['Brazil', 'Roma', 'Italia']),
        ];
    }
}
