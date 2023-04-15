<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Repositories\Collections\Car::truncate();

        \App\Repositories\Models\User::factory()->create();
        \App\Repositories\Models\Brand::factory(10)->create();
        \App\Repositories\Models\Color::factory(5)->create();
        \App\Repositories\Collections\Car::factory(100)->create();
    }
}
