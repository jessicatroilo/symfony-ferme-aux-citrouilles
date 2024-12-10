<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
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
    public function list(ProductRepository $productRepository, Request $request): Response
    {
        //renvoi à la page courante
        $currentPage = $request->query->get('page', 1);
        //On récupère la liste de tous les produits + pagination
        $allProducts = $productRepository->paginateProduct($currentPage);

        //dd($allProducts->count()); // On affiche le nombre de produits

        return $this->render('product/list.html.twig', [
            'productList' => $allProducts,
        ]);
    }

    /**
     * Method to show product details
     * 
     * @param Product $product
     * @return Response
     */
    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}

