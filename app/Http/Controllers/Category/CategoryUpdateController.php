<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Services\CategoryService;

class CategoryUpdateController
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }



    public function update(CategoryUpdateRequest $request, $id): \Illuminate\Http\RedirectResponse
    {

        $this->categoryService->categoryUpdateService($request->validated(), $id);

        return redirect()->route('category')
            ->with('success', 'The category has been updated successfully!');


    }
}