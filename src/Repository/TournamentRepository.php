<?php

namespace App\Repository;

use App\Entity\Tournament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tournament>
 *
 * @method Tournament|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tournament|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tournament[]    findAll()
 * @method Tournament[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TournamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tournament::class);
    }

    public function save(Tournament $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Tournament $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function findAllFuture(): array
    {
        return $this->createQueryBuilder('tournament')
            ->where('tournament.dateStart > :today')
            ->orderBy('tournament.dateStart', 'ASC')
            ->setParameter(':today', new \DateTime())
            ->getQuery()
            ->getResult();
    }

    public function findFuture(int $limit = 4): array
    {
        // SELECT*FROM gig WHERE date_start > NOW() ORDER BY date_start ASC LIMIT 4
        return $this->createQueryBuilder('tournament')
            ->where('tournament.dateStart > :today')
            ->orderBy('tournament.dateStart', 'ASC')
            ->setMaxResults($limit)
            ->setParameter(':today', new \DateTime())
            ->getQuery()
            ->getResult();
    }

    public function findPast(int $limit = 1): array
    {
        return $this->createQueryBuilder('tournament')
            ->where('tournament.dateStart < :today')
            ->orderBy('tournament.dateStart', 'DESC')
            ->setMaxResults($limit)
            ->setParameter(':today', new \DateTime())
            ->getQuery()
            ->getResult();
    }

    public function findUserInTournament(): array
    {
        return $this->createQueryBuilder('tournament')
            ->addSelect('user')
            ->join('tournament.user', 'user')
            ->orderBy('user.firstName', 'ASC')
            ->getQuery()
            ->getResult();
    }




















//    /**
//     * @return Tournament[] Returns an array of Tournament objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tournament
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
