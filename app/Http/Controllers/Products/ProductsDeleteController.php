<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;


class ProductsDeleteController extends Controller
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


    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {

        $this->productService->deleteProductService($id);

        return redirect()->route('products')->with('error', 'Product not found!');

    }


}
