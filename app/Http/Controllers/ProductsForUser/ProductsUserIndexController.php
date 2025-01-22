<?php

namespace App\Http\Controllers\ProductsForUser;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsUserIndexController extends Controller
{
public function index(){
    $products = Product::paginate(12);

    return view('ProductsForUser.index', compact('products'));
}

}