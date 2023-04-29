<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\Brand>
 */
class BrandFactory extends Factory
{
    public $model = \App\Repositories\Models\Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->firstName()
        ];
    }
}
