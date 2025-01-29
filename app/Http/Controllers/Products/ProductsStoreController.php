<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\View\View;


class ProductsStoreController extends Controller
{
    private ProductService $productService;
    private CategoryService $categoryService;


    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }


    public function showCreateForm(): View
    {
        $categories = $this->categoryService->getCategories();
        return view('products.showCreateForm', compact('categories'));
    }


    public function store(ProductStoreRequest $request)
    {

        $this->productService->createProduct($request->validated());

        return redirect()->route('products')->with('success', 'Product created successfully!');
    }
}