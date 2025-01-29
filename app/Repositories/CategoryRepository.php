<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{


    public function getAllCategories()
    {
        return Category::all();
    }

public function getCategoryById($id){
        return Category::findOrFail($id)->name;
}

}