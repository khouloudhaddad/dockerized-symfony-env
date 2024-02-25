<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/product", methods={"POST"})
     */
    public function createProduct(): JsonResponse
    {
        $request = Request::createFromGlobals();
        $productInfo = $request->toArray();
        $product = new Product();

        $product->setName($productInfo["name"]);
        $product->setDescription($productInfo["description"]);
        $product->setAmount($productInfo["amount"]);
        $product->setPrice($productInfo["price"]);
        $this->productRepository->save($product);

        return $this->json("New product successfully created ".$product->getId());
    }
}