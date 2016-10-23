<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/10/16
 * Time: 6:26 AM
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository
{
    public function findAllPublishedOrderedBySize()
    {
        return $this->createQueryBuilder('genus')
            ->andWhere('genus.isPublished = :isPublished')
            ->setParameter('isPublished', true)
            ->orderBy('genus.speciesCount', 'DESC')
            ->getQuery()
            ->execute();
    }

}