<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\Color>
 */
class ColorFactory extends Factory
{
    public $model = \App\Repositories\Models\Color::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'color' => $this->faker->colorName()
        ];
    }
}
