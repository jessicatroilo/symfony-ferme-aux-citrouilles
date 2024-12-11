<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\SearchProductType;
use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/product', name: 'app_front_product_')]
class ProductController extends AbstractController
{
    /**
     * Method to show all products with pagination
     *
     * @param ProductRepository $productRepository
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(ProductRepository $productRepository, Request $request): Response
    {
        //renvoi à la page courante
        $currentPage = $request->query->get('page', 1);
        
        //Afficher formulaire du nombre produit par page
        //Création du formulaire
        $formProductsPerPage = $this->createForm(SearchProductType::class);
        $formProductsPerPage->handleRequest($request);
        
        //Nombre de produits par page
        $productsPerPage = $request->query->getInt('productsPerPage', 5);

        //Si le formulaire est soumis et valide
        if ($formProductsPerPage->isSubmitted() && $formProductsPerPage->isValid()) {
            $productsPerPage = $formProductsPerPage->get('productToShow')->getData();
        }
            //Paginer les produits en appellant le repository
            //On récupère la liste de tous les produits + pagination
        $allProducts = $productRepository->paginateProduct($currentPage, $productsPerPage);
        

        //dd($allProducts->count()); // On affiche le nombre de produits

        return $this->render('product/list.html.twig', [
            'productList' => $allProducts,
            'formProductsPerPage' => $formProductsPerPage->createView()
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