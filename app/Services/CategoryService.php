<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }







}