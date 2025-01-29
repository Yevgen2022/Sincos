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

      public function categoryCreateService($data)
      {

          $data['slug'] = Str::slug($data['name']);
           return $this->categoryRepository->categoryCreateRepository($data);
      }


}