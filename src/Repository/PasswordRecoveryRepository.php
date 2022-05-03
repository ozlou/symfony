<?php

namespace App\Repository;

use App\Entity\PasswordRecovery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PasswordRecovery>
 *
 * @method PasswordRecovery|null find($id, $lockMode = null, $lockVersion = null)
 * @method PasswordRecovery|null findOneBy(array $criteria, array $orderBy = null)
 * @method PasswordRecovery[]    findAll()
 * @method PasswordRecovery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PasswordRecoveryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PasswordRecovery::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PasswordRecovery $entity, bool $flush = true): void
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
    public function remove(PasswordRecovery $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PasswordRecovery[] Returns an array of PasswordRecovery objects
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
    public function findOneBySomeField($value): ?PasswordRecovery
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
