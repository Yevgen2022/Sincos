<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {

        $product = Product::findOrFail($id);

        if ($product) {
            $product->delete();
            return redirect()->route('products')->with('success', 'Product deleted successfully!');
        }

        return redirect()->route('products')->with('error', 'Product not found!');;

    }


}
