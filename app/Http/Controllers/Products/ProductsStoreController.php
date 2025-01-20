<?php

namespace App\Http\Controllers\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ProductsStoreController
{


    public function showCreateForm()
    {
        return view('products.showCreateForm');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'price' => [
                'required',
                'regex:/^\d+([.,]\d{1,2})?$/', // Allows numbers with comma or period, maximum 2 characters after
            ],
        ], [
            'description.required' => 'The product description is required.',
            'description.max' => 'The product description must not exceed 100 characters.',
            'price.regex' => 'The price must be a valid number with up to two decimal places.',
        ]);

        // Creating a slug based on name
        $slug = Str::slug($validatedData['name']);   // We use the auxiliary function str_slug (with Laravel 8.x it can be str()->slug())
        $faker = Faker::create();
        $price = $validatedData['price'];


        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->slug = $slug;
        $product->setFormattedPrice($price);
        $product->vat_rate = $faker->randomElement([5, 10, 20]); // Incidental VAT
        $product->category_id = \App\Models\Category::inRandomOrder()->first()->id; // accident category
        $product->save();


        return redirect()->route('products')->with('success', 'Product created successfully!');
    }
}