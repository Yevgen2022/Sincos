<?php

namespace App\Http\Controllers\ProductsForUser;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsUserIndexController extends Controller
{

    private $productsService;

    public function __construct(ProductService $productsService){
        $this->productsService = $productsService;
    }

    public function index(Request $request)
    {

        $search = $request->input('search');
        $itemsPerPage = $search ? 4 : 12; // 4 for search, 12 for no search

//    $products = Product::paginate(12);

        // Якщо є запит, фільтруємо товари, інакше отримуємо всі
//        $products = Product::when($search, function ($query, $search) {
//            return $query->where('name', 'LIKE', "%{$search}%");
//        })->paginate($itemsPerPage);

        $products = $this->productsService->searchProductsService($search, $itemsPerPage);


        return view('ProductsForUser.index', compact('products'));
    }

}