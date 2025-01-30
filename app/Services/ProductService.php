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


    public function getPaginateService($number)
    {
        return $this->productRepository->getPaginateRepository($number);
    }

    public function createProductService(array $data)
    {
        $product = new Product();
        $faker = Faker::create();

        $data['slug'] = Str::slug($data['name']);

        $product->setFormattedPrice($data['price']);
        // Now we store the calculated value for price_excluding_vat_in_minor_units in the array
        $data['price_excluding_vat_in_minor_units'] = $product->price_excluding_vat_in_minor_units;

        $data['vat_rate'] = $faker->randomElement([5, 10, 20]);
        $data['img_src'] = Product::inRandomOrder()->value('img_src');

        return $this->productRepository->createProductRepository($data);
    }


    public function getProductByIdService(int $id)
    {
        return $this->productRepository->findByIdRepository($id);
    }


    public function updateProductService(int $id, array $data)
    {
        $product = new Product();
        $product->setFormattedPrice($data['price']);
        // Now we store the calculated value for price_excluding_vat_in_minor_units in the array
        $data['price_excluding_vat_in_minor_units'] = $product->price_excluding_vat_in_minor_units;

        $data['slug'] = Str::slug($data['name']);

        return $this->productRepository->updateProductRepository($id, $data);
    }


    public function deleteProductService(int $id): void
    {
        if (!$this->productRepository->deleteProductRepository($id)) {
            throw new ModelNotFoundException("Product not found.");
        }
    }

    public function searchProductsService($search, $itemsPerPage)
    {
        return $this->productRepository->searchProductsRepository($search, $itemsPerPage);
    }


}
