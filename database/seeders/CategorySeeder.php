<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//        Category::factory()->create();

        // Add category
        $categories = [
            "beauty",
            "fragrances",
            "furniture",
            "groceries",
            "home-decoration",
            "kitchen-accessories",
            "laptops",
            "mens-shirts",
            "mens-shoes",
            "mens-watches",
            "mobile-accessories",
            "motorcycle",
            "skin-care",
            "smartphones",
            "sports-accessories",
            "sunglasses",
            "tablets",
            "tops",
            "vehicle",
            "womens-bags",
            "womens-dresses",
            "womens-jewellery",
            "womens-shoes",
            "womens-watches"
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),  // Create a slug from the name value
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }





    }
}
