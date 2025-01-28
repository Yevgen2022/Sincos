<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::all();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function findById(int $id)
    {
        return Product::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $product = $this->findById($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool
    {
        $product = $this->findById($id);
        return $product->delete();
    }
}
