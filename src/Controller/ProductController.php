<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/product', name: 'app_front_product_')]
class ProductController extends AbstractController
{
    /**
     * Method to show list of products
     *
     * @param ProductRepository $productRepository
     * @return Response
     */
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(ProductRepository $productRepository): Response
    {
        $allProducts = $productRepository->findAll();

        return $this->render('product/list.html.twig', [
            'productList' => $allProducts,
        ]);
    }
}

