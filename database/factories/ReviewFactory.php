<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'review' => $this->faker->sentence(10),
            'user_rating' => $this->faker->numberBetween(1,5),      //user evaluation of the product
//            'review' => implode(' ', array_slice(explode(' ', $this->faker->sentence(20)), 0, 10)),

        ];
    }
}
