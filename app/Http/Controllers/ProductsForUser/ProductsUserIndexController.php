<?php

namespace App\Http\Controllers\ProductsForUser;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsUserIndexController extends Controller
{
public function index(Request $request){

    $search = $request->input('search');

//    $products = Product::paginate(12);

    // Якщо є запит, фільтруємо товари, інакше отримуємо всі
    $products = Product::when($search, function ($query, $search) {
        return $query->where('name', 'LIKE', "%{$search}%");
    })->paginate(4);



    return view('ProductsForUser.index', compact('products'));
}

}