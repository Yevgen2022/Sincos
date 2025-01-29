<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;

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

    public function getCategoriesOnlyIdService(int $id)
    {
        return $this->categoryRepository->getCategoryOnlyIdRepository($id);
    }




    public function categoryCreateService($data)
    {

        $data['slug'] = Str::slug($data['name']);
        return $this->categoryRepository->categoryCreateRepository($data);
    }

    public function categoryDeleteService($id)
    {
        return $this->categoryRepository->categoryDeleteRepository($id);
    }


    public function categoryUpdateService($data, $id)
    {
        $this->categoryRepository->categoryUpdateRepository($data, $id);
    }
}