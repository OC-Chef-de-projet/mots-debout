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

class PostPublishDate
{

    /**
     * Update publishedDate
     *
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if($entity instanceof Post) {
            $updatePublished = false;

            if ($args->hasChangedField('status')){
                $new = $args->getNewValue('status');
                $old = $args->getOldValue('status');
                
                // Update published date only if asked
                // but don't update published date
                // if already in published state
                if (($new == Post::PUBLISHED) &&  ($old != Post::PUBLISHED) ) {
                    $updatePublished = true;
                }

                // if old status is published and the new one is an other status
                // remove published date
                if (($new != Post::PUBLISHED) &&  ($old == Post::PUBLISHED) ) {
                    $updatePublished = false;
                    $entity->setPublishedAt(null);
                }
            }

            if($updatePublished === true){
                $entity->setPublishedAt(new \DateTime());
            }
        }
    }
}