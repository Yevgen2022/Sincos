<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductSearchRequest extends FormRequest
{

    public function rules()
    {
        return [
            'search' => 'nullable|string|max:255',
        ];
    }

}