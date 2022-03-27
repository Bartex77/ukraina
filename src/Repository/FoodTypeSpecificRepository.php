<?php

namespace App\Repository;

use App\Entity\FoodTypeSpecific;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FoodTypeSpecific|null find($id, $lockMode = null, $lockVersion = null)
 * @method FoodTypeSpecific|null findOneBy(array $criteria, array $orderBy = null)
 * @method FoodTypeSpecific[]    findAll()
 * @method FoodTypeSpecific[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoodTypeSpecificRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FoodTypeSpecific::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FoodTypeSpecific $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(FoodTypeSpecific $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FoodTypeSpecific[] Returns an array of FoodTypeSpecific objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FoodTypeSpecific
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
