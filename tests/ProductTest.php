<?php

namespace App\Tests;

use App\Entity\Product;
use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductTest extends KernelTestCase
{
    public function testProduct(){
        static::bootKernel();
        $container = static::getContainer();

        $productInfo = [
            "name" => "TestName",
            "description" => "TestDescription",
            "amount" => 1,
            "price" => 10
        ];

        /** @var ProductService $productService */
        $productService = $container->get(ProductService::class);
        $product = $productService->addProduct($productInfo);

        $this->assertInstanceOf(Product::class, $product);

    }
}