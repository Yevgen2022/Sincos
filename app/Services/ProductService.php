<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function getProductById(int $id)
    {
        return $this->productRepository->findById($id);
    }

    public function updateProduct(int $id, array $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct(int $id): void
    {
        if (!$this->productRepository->delete($id)) {
            throw new ModelNotFoundException("Product not found.");
        }
    }
}
