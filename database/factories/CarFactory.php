<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Collections\Car>
 */
class CarFactory extends Factory
{
    public $model = \App\Repositories\Collections\Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model' => $this->faker->firstName(),
            'id_brand' => rand(1, 10),
            'id_color' => rand(1, 5),
            'year' => (int) $this->faker->year(),
            'price' => rand(10000, 1000000)
        ];
    }
}
