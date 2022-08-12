<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10000, 100000),
            'thumbnail_url' => $this->faker->imageUrl(100, 100),
            'status' => rand(0, 1),
            'content' => $this->faker->text(),
            'category_id' => rand(1, 10),

        ];
    }
    
}
