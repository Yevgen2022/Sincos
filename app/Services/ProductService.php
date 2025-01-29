<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

//    public function getAllProducts()
//    {
//        return $this->productRepository->getAll();
//    }


    public function getPaginate($number)
    {
        return $this->productRepository->getProductPaginate($number);
    }

    public function createProduct(array $data)
    {
        $product =new Product();
        $faker = Faker::create();

        $data['slug'] = Str::slug($data['name']);

        $product->setFormattedPrice($data['price']);
        // Now we store the calculated value for price_excluding_vat_in_minor_units in the array
        $data['price_excluding_vat_in_minor_units'] = $product->price_excluding_vat_in_minor_units;

        $data['vat_rate'] = $faker->randomElement([5, 10, 20]);
        $data['img_src'] = Product::inRandomOrder()->value('img_src');

        return $this->productRepository->create($data);
    }



    public function getProductById(int $id)
    {
        return $this->productRepository->findById($id);
    }


    public function updateProduct(int $id, array $data)
    {
        $product =new Product();
        $product->setFormattedPrice($data['price']);
        // Now we store the calculated value for price_excluding_vat_in_minor_units in the array
        $data['price_excluding_vat_in_minor_units'] = $product->price_excluding_vat_in_minor_units;

        $data['slug'] = Str::slug($data['name']);

        return $this->productRepository->update($id, $data);
    }


    public function deleteProduct(int $id): void
    {
        if (!$this->productRepository->delete($id)) {
            throw new ModelNotFoundException("Product not found.");
        }
    }
}
