<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 21-08-17
 * Time: 10:10
 */

namespace AppBundle\EventListener;

use AppBundle\Entity\Page;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class PageListener
{

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        /*
        $entity = $args->getObject();
        $entity->setCreatedAt(new \DateTime());
        */
    }
}
