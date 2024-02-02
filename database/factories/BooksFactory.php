<?php

namespace Database\Factories;

use App\Models\Authors;
use App\Models\Categories;
use App\Models\Editorials;
use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $author = Authors::all()->random();
        $category = Categories::all()->random();
        $editorial = Editorials::all()->random();
        return [
            'title' => $this->faker->text(),
            'author_id' => $author->id,
            'category_id' => $category->id,
            'editorial_id' => $editorial->id,
            'year_publication'  => date('Y-m-d'),
        ];
    }
}
