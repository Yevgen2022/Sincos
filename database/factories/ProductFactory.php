<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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

    protected $model = Product::class;

    public function definition(): array
    {
        return [



//            'name' => $this->faker->word,
//            'slug' => $this->faker->slug,
//            'description' => $this->faker->sentence,
//            'price_excluding_vat_in_minor_units' => $this->faker->numberBetween(1000, 100000), // Example price from 10 to 1000
//            'vat_rate' => $this->faker->randomElement([5, 10, 20]), // Incidental VAT
//            'rating' => $this->faker->numberBetween(1,5),
//            'category_id' => Category::inRandomOrder()->first()->id, // Random category

            'name' => $this->faker->words(2, true),
            'slug' => Str::slug($this->faker->unique()->words(2, true)),
            'description' => $this->faker->sentence(),
            'price_excluding_vat_in_minor_units' => $this->faker->numberBetween(1000, 100000),
            'vat_rate' => $this->faker->randomElement([5, 10, 20]),
            'rating' => $this->faker->numberBetween(1, 5),
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1,
            'img_src' => null,


        ];
    }
}
