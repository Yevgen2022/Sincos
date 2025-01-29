<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{

    private $categoryRepository;


    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }



    public function getCategoriesId(int $id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }




}