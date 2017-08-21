<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 21-08-17
 * Time: 10:10
 */

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Post;

class PostCreateDate
{

    /**
     * Set createdAt field
     *
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if($entity instanceof Post) {
                $entity->setCreatedAt(new \DateTime());
        }
    }
}