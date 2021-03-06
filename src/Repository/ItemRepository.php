<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Item $entity, bool $flush = true): void
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
    public function remove(Item $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return Item[] Returns an array of Item objects
     */
    public function findAllItemsOrderByPublished()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.published', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Item[] Returns an array of Item objects
     */
    public function findItemsByCategoryOrderByPublished($value)
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('i.category', 'c')
            ->andWhere('c.title = :val')
            ->setParameter('val', $value)
            ->orderBy('i.published', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Item[] Returns an array of Item objects
     */
    public function findItemsByUserOrderByPublished($value)
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('i.owner', 'u')
            ->andWhere('u.id = :val')
            ->setParameter('val', $value)
            ->orderBy('i.published', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Item[] Returns an array of Item objects
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
    public function findOneBySomeField($value): ?Item
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
