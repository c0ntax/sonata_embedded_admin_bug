<?php

namespace App\Repository;

use App\Entity\SubContainer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SubContainer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubContainer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubContainer[]    findAll()
 * @method SubContainer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubContainerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubContainer::class);
    }

    // /**
    //  * @return SubContainer[] Returns an array of SubContainer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubContainer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
