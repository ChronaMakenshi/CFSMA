<?php

namespace App\Repository;

use App\Entity\Courspublics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Courspublics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Courspublics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Courspublics[]    findAll()
 * @method Courspublics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourspublicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Courspublics::class);
    }

    // /**
    //  * @return Courspublics[] Returns an array of Courspublics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Courspublics
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
