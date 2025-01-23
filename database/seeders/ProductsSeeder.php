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
    public function returnCategoryId($str)
    {
        $category = Category::where('slug', $str)->first();
        if (!$category) {
            \Log::warning("Category not found: " . $str);
        }
        return $category->id;
    }

    public function run(): void
    {
//        $response = file_get_contents('https://dummyjson.com/products');
          $response =file_get_contents('https://fakestoreapi.com/products');
//        $products = json_decode($response)->products;
        $products = json_decode($response, true);

        foreach ($products as $product) {

            dump([
//                'Product Title' => $product->title,
//                'Product Price' => $product->price,
//                'Product Category' => $product->category,
//                'Category Img' => $product->img,
//                'Generated Slug' => Str::slug($product->title),
//                'Category ID' => $this->returnCategoryId($product->category),
                'title' => $product['title'] ?? 'N/A',
                'price' => $product['price'] ?? 0,
                'description' => $product['description'] ?? 'No description',
                'image' => $product['image'] ?? null,
//            ]);


//            DB::table('products')->insert([
//                'name' => $product->title,
//                'price_excluding_vat_in_minor_units' => $product->price,
//                'slug' => Str::slug($product->title),
//                'description' => $product->description,
//                'img_src' => $product->images[0],
//                'vat_rate' => rand(5, 25),
//                'category_id' => $this->returnCategoryId($product->category), // Викликаємо метод через $this

            ]);
        }

    }
}
