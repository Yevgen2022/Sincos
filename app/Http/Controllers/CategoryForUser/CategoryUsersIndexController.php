<?php

namespace App\Http\Controllers\CategoryForUser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryUsersIndexController extends Controller
{
    public function index()
    {
// Get all categories
        $categories = Category::all();

        // Initialize an empty list of products by default
        $products = collect();


        return view('CategoryForUsers.index', compact('categories','products'));
    }

    public function filter(Request $request)
    {
        // Check if transmitted categoryId
        $categoryId = $request->get('categoryId');
        if (!$categoryId) {
            return redirect()->route('categoryforusers.index')->with('error', 'Category have not chosen.');
        }

        // Get all categories
        $categories = Category::all();

        // Get products for the selected category
        $products = Product::where('category_id', $categoryId)->get();

        // Transmit into form
        return view('CategoryForUsers.index', compact('categories', 'products'));
    }

}