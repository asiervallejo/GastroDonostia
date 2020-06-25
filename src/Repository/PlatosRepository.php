<?php

namespace App\Repository;

use App\Entity\Platos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Platos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Platos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Platos[]    findAll()
 * @method Platos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Platos::class);
    }

    // /**
    //  * @return Platos[] Returns an array of Platos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Platos
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
