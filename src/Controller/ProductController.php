<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private ProductRepository $productRepository;
    private ProductService $productService;

    public function __construct(ProductRepository $productRepository, ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    /**
     * @Route("/product", methods={"POST"})
     */
    public function createProduct(): JsonResponse
    {
        $request = Request::createFromGlobals();
        $productInfo = $request->toArray();

        $product = $this->productService->addProduct($productInfo);

        return $this->json("New product successfully created #".$product->getId());
    }
}