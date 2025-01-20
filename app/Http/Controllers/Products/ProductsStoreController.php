<?php

namespace App\Http\Controllers\Products;

class ProductsStoreController
{


    public function showCreateForm(){
        return view('products.showCreateForm');
    }
}