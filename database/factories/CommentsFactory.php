<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();
        $book = Books::all()->random();

        return [
            'content' => $this->faker->text(),
            'user_id' => $user->id,
            'book_id' => $book->id,
        ];
    }
}
