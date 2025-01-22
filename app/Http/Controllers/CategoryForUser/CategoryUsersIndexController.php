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
// Отримати всі категорії
        $categories = Category::all();

        // Ініціалізувати порожній список продуктів за замовчуванням
        $products = collect();


        return view('CategoryForUsers.index', compact('categories','products'));
    }

    public function filter(Request $request)
    {
        // Перевірити, чи переданий categoryId
        $categoryId = $request->get('categoryId');
        if (!$categoryId) {
            return redirect()->route('CategoryForUsers.index')->with('error', 'Category have not chosen.');
        }

        // Отримати всі категорії
        $categories = Category::all();

        // Отримати продукти для вибраної категорії
        $products = Product::where('category_id', $categoryId)->get();

        // Передати у вигляд
        return view('CategoryForUsers.index', compact('categories', 'products'));
    }

}