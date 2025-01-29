<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{


    public function getCategoriesRepository()
    {
        return Category::all();
    }


    public function getCategoryOnlyIdRepository($id)
    {
        return Category::findOrFail($id);
    }


    public function getCategoryByIdRepository($id)
    {
        return Category::findOrFail($id)->name;
    }


    public function getCategoryPaginateRepository($number)
    {
        return Category::paginate($number);
    }

    public function categoryCreateRepository($data)
    {
        return Category::create($data);
    }

    public function categoryDeleteRepository($id)
    {
        return Category::destroy($id);
    }

    public function categoryUpdateRepository($data, $id)
    {
        $category = Category::where('id', $id)->first();
        if (!$category) {
            abort(404, 'Category not found'); // Якщо категорія не знайдена
        }

        return $category->update($data);
    }

}