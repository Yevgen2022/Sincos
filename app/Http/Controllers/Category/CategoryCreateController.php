<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryCreateController extends Controller
{

    private  $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }


    public function showForm(): View
    {

        return view('Category.create');
    }

    public function store(CategoryStoreRequest $request)
    {

        $this->categoryService->categoryCreateService($request->validated());


        return redirect()->route('category')->with('success', 'Category created successfully!');
    }
}
