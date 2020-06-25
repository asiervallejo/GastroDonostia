<?php

namespace App\Repository;

use App\Entity\Bebidas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bebidas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bebidas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bebidas[]    findAll()
 * @method Bebidas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BebidasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bebidas::class);
    }

    // /**
    //  * @return Bebidas[] Returns an array of Bebidas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bebidas
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
