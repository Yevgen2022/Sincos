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


    public function getCategoriesService()
    {
        return $this->categoryRepository->getCategoriesRepository();
    }


    public function getCategoriesPaginateService($number)
    {
        return $this->categoryRepository->getCategoryPaginateRepository($number);
    }


    public function getCategoriesIdService(int $id)
    {
        return $this->categoryRepository->getCategoryByIdRepository($id);
    }




}