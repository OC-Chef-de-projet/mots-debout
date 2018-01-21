<?php
/**
 * Created by PhpStorm.
 * User: psa
 * Date: 11/01/18
 * Time: 20:10
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Training;

class TrainingRepository extends \Doctrine\ORM\EntityRepository
{

    public function upcoming()
    {
        $query = $this->createQueryBuilder('t')
            ->where('t.startAt > :startAt')
            ->setParameter('startAt', new \DateTime('now'))
            ->getQuery();
        $results = $query->getResult();
        return $results;
    }
}