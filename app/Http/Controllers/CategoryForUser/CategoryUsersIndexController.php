<?php

namespace App\Http\Controllers\CategoryForUser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryUsersIndexController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('CategoryForUsers.index', compact('categories'));
    }

    public function filter(Request $request)
    {
        $categoryId = $request->categoryId;

        $categories = Category::all();
        $products = Product::where('category_id', $categoryId)->get();

        return view('CategoryForUsers.index', compact('categories', 'products'));
    }


}