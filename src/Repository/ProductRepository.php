<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private PaginatorInterface $paginator)
    {
        parent::__construct($registry, Product::class);
        $this->paginator = $paginator;
    }


    /**
     * Method to paginate products with KnpPaginator (bundle : https://github.com/KnpLabs/KnpPaginatorBundle)
     *
     * @param integer $currentPage
     * @param integer $productsPerPage
     * @return PaginationInterface
     */
    public function paginateProduct(int $currentPage, int $productsPerPage) : PaginationInterface
    {
        $queryBuilder = $this->createQueryBuilder('p');

        return $this->paginator->paginate(
            $queryBuilder, // Requête contenant les données à paginer
            $currentPage, // Numéro de la page en cours, 1 par défaut
            $productsPerPage // Nombre de résultats par page

        );
    }

//    /**
//     * @return Product[] Returns an array of Product objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Product
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    

   
}
