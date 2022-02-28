<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

    /**
      * @return Reservation[] Returns an array of Reservation objects
      */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
   
/***************************************************************************************************************************/
  
    public function listReservation(){
        return $this->createQueryBuilder('r')
            ->where('r.id LIKE ?1')
            ->andWhere('r.user LIKE ?2')
            ->setParameter('1', 'L%')
            ->setParameter('2', '%V%')
            ->getQuery()
            ->getResult();
    }
    public function orderByMail()
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.user', 'ASC')
            ->getQuery()->getResult();
    }
    public function searchReservation($id)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.id LIKE :id')
            ->setParameter('id', '%'.$id.'%')
            ->getQuery()
            ->execute();
    }
    public function orderByDate()
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.date_reservation', 'DESC')
         //   ->setMaxResults(3)
            ->getQuery()->getResult();
    }

    
    //Question 1 -DQL
    public function ReservationsPerDate($dateOne,$dateTwo){
        $entityManager=$this->getEntityManager();
        $query=$entityManager
            ->createQuery("SELECT r FROM APP\Entity\Reservation r WHERE r.date_reservation BETWEEN :dateOne AND :dateTwo")
            ->setParameters(['dateOne'=>$dateOne,'dateTwo'=>$dateTwo]);
        return $query->getResult();

        /**
         * Solution avec QueryBuilder
         */
        /*$qb= $this->createQueryBuilder('r');
        $qb ->where('r.date_reservation BETWEEN :dateOne AND :dateTwo');
        $qb->setParameters(['dateOne'=>$dateOne,'dateTwo'=>$dateTwo]);
        return $qb->getQuery()->getResult();*/
    }
}
