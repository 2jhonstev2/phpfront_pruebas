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
            'name' => $this->faker->randomElement(['Bancroft Press', 'Regal House Publishing', 'Koehler Books','Shambhala Publications']),
            'location' => $this->faker->randomElement(['Brazil', 'Roma', 'Italia']),
        ];
    }
}
