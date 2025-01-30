<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository

{
//    public function getAll()
//    {
//        return Product::all();
//    }


    public function getPaginateRepository($number)
    {
        return Product::paginate($number);
    }


    public function createProductRepository(array $data)
    {
        return Product::create($data);
    }


    public function findByIdRepository(int $id)
    {
        return Product::findOrFail($id);
    }


    public function updateProductRepository(int $id, array $data)
    {
        $product = $this->findByIdRepository($id);
        $product->update($data);
        return $product;
    }

    public function deleteProductRepository(int $id): bool
    {
        $product = $this->findByIdRepository($id);
        return $product->delete();
    }

    public function searchProductsRepository($search, $itemsPerPage)
    {
        return Product::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })->paginate($itemsPerPage);
    }


}
