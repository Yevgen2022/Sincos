<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $response = file_get_contents('https://dummyjson.com/products?limit=100');
        $products = json_decode($response)->products;

        foreach ($products as $product) {

            DB::table('products')->insert([
                'name' => $product->title,
                'price_excluding_vat_in_minor_units' => $product->price,
                'slug' => Str::slug($product->title),
                'description' => $product->description,
//                'img_src' => $product->images[0],
                'img_src' => $product->thumbnail,
                'vat_rate' => rand(5, 25),
                'category_id' => rand(1,24), // Викликаємо метод через $this

            ]);
        }

    }
}
