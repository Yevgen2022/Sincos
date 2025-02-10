<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id', // We check that the category exists
            'price' => [
                'required',
                'regex:/^\d+([.,]\d{1,2})?$/' // A number with a comma or period, up to 2 decimal places
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'The product description is required.',
            'description.max' => 'The product description must not exceed 100 characters.',
            'price.regex' => 'The price must be a valid number with up to two decimal places.',
            'category.required' => 'The category is required.',
            'category.exists' => 'The selected category is invalid.',
        ];
    }
}
