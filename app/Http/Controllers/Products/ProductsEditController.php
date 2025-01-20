<?php

namespace App\Http\Controllers\Products;

use Illuminate\Support\Facades\View;

class ProductsEditController
{


    public function showEditForm($Request):view
    {

        return view('products.showEditForm');

    }
}