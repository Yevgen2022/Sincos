<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsUpdateController extends Controller
{

    private ProductService $productService;
    private CategoryService $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService, )
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }


    public function showEditForm($id)
    {
        $categories = $this->categoryService->getCategories();
        $product = $this->productService->getProductById($id);
        $currentCategoryName = $this->categoryService->getCategoriesId($product->category_id);

        return view('products.showEditForm', compact('product', 'categories', 'currentCategoryName'));

    }

    public function update(ProductUpdateRequest $request, $id): \Illuminate\Http\RedirectResponse
    {

        $this->productService->getProductById($id);
        $this->productService->updateProduct($id,$request->validated());

        return redirect()->route('products')->with('success', 'Product updated successfully!');
    }


}