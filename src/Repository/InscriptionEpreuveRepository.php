<?php

namespace App\Repository;

use App\Entity\InscriptionEpreuve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionEpreuve|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionEpreuve|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionEpreuve[]    findAll()
 * @method InscriptionEpreuve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionEpreuveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionEpreuve::class);
    }

    // /**
    //  * @return InscriptionEpreuve[] Returns an array of InscriptionEpreuve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InscriptionEpreuve
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
