<?php

namespace App\Http\Controllers\Products;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsUpdateController
{


    public function showEditForm($id)
    {

        $product = Product::findOrFail($id);
        return view('products.showEditForm', compact('product'));

    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($id);

        // Валідація даних
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

        // Оновлення продукту
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->setFormattedPrice($validatedData['price']);
        $product->save();

        return redirect()->route('products')->with('success', 'Product updated successfully!');
    }


}