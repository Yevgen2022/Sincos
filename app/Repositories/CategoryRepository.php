<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{


    public function getCategoriesRepository()
    {
        return Category::all();
    }

    public function getCategoryByIdRepository($id)
    {
        return Category::findOrFail($id)->name;
    }


    public function getCategoryPaginateRepository($number)
    {
        return Category::paginate($number);
    }

    public function categoryCreateRepository($data){
        return Category::create($data);
    }




}