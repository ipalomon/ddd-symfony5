<?php

namespace App\Infrastructure\User\Repository;

use App\Infrastructure\Share\Repository\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends EntityRepository<User>
 *
 * @method \App\Infrastructure\User\Repository\User|null find($id, $lockMode = null, $lockVersion = null)
 * @method \App\Infrastructure\User\Repository\User|null findOneBy(array $criteria, array $orderBy = null)
 * @method \App\Infrastructure\User\Repository\User[]    findAll()
 * @method \App\Infrastructure\User\Repository\User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends EntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, \App\Infrastructure\User\Repository\User::class);
    }

    public function add(\App\Infrastructure\User\Repository\User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(\App\Infrastructure\User\Repository\User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Users
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}