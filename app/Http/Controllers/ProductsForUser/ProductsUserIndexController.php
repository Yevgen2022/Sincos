<?php

namespace App\Http\Controllers\ProductsForUser;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsUserIndexController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        // Перевірка на наявність пошукового запиту
        $itemsPerPage = $search ? 4 : 12; // 4 для пошуку, 12 для без пошуку

//    $products = Product::paginate(12);

        // Якщо є запит, фільтруємо товари, інакше отримуємо всі
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })->paginate($itemsPerPage);


        return view('ProductsForUser.index', compact('products'));
    }

}