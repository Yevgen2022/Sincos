<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsIndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */










    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }



// Показати всі продукти
//    public function index(): JsonResponse
//    {
//        $products = $this->productService->getAllProducts();
//        return response()->json($products);
//    }








    public function __invoke()
    {

        /**
         * Get all categories from table categories
         */
        $products = Product::paginate(5);

        /**
         * creates an array with the 'categories' key, which is available in the Blade template.
         */

        return view('Products.index', compact('products'));
    }


}
