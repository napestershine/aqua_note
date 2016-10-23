<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/10/16
 * Time: 6:26 AM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Genus;
use AppBundle\Entity\GenusNote;
use Doctrine\ORM\EntityRepository;

class GenusNoteRepository extends EntityRepository
{
    /**
     * @param Genus $genus
     * @return GenusNote[]
     */
    public function findAllRecentNotesForGenus(Genus $genus)
    {
        return $this->createQueryBuilder('genus_note')
            ->andWhere('genus_note.genus = :genus')
            ->setParameter('genus', $genus)
            ->andWhere('genus_note.createdAt > :recentDate')
            ->setParameter('recentDate', new \DateTime('-3 months'))
            ->getQuery()
            ->execute();
    }

}