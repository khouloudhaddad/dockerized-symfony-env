<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepositor)
    {
        $this->productRepository = $productRepositor;
    }

    public function addProduct($productInfo): Product
    {
        $product = new Product();

        $product->setName($productInfo["name"]);
        $product->setDescription($productInfo["description"]);
        $product->setAmount($productInfo["amount"]);
        $product->setPrice($productInfo["price"]);
        $this->productRepository->save($product);

        return $product;

    }
}