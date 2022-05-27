<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producName = $this->faker->word;
        return [
            'sku' => $producName,
            'name' => ucfirst($producName),
            'id_category' => rand(1, 20),
            'description' => $this->faker->text(200),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'amount' => rand(10, 1000),
            'status' => rand(0, 1),
        ];
    }
}
