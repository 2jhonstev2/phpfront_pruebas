<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Authors::factory(30)->create();
        \App\Models\Categories::factory(15)->create();
        \App\Models\Editorials::factory(10)->create();
        \App\Models\Books::factory(20)->create();
        \App\Models\Comments::factory(5)->create();
    }
}
