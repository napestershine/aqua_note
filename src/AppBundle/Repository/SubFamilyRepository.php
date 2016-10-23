<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/10/16
 * Time: 6:26 AM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class SubFamilyRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('sub_family')->orderBy('sub_family.name', 'ASC');
    }

}