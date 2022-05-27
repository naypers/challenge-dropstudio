<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_product' => rand(1, 200),
            'id_user' => rand(1, 10),
            'rating' => rand(1, 5),
        ];
    }
}
