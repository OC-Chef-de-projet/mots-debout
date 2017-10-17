<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 21-08-17
 * Time: 10:10.
 */

namespace AppBundle\EventListener;

use AppBundle\Entity\Page;
use Doctrine\ORM\Event\LifecycleEventArgs;

class PageListener
{
    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if ($entity instanceof Page) {
            $entity->setCreatedAt(new \DateTime());
        }
    }
}
