<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryCreateController extends Controller
{
    public function showForm(): View
    {

        return view('Category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Creating a slug based on name
        $slug = Str::slug($validated['name']);  // We use the auxiliary function str_slug (with Laravel 8.x it can be str()->slug())

        Category::create([
            'name' => $validated['name'],
            'slug' => $slug
        ]);

        return redirect()->route('category')->with('success', 'Category created successfully!');
    }
}
