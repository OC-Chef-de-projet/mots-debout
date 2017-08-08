<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 22:04
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;


class LoadCategoryData implements FixtureInterface
{




    public function load(ObjectManager $manager)
    {
        $this->add($manager,'CAT1');
        $this->add($manager,'CAT2');
        $this->add($manager,'CAT3');
    }

    private function add(ObjectManager $manager,$catName){
        $cat = new Category();
        $cat->setName($catName);
        $manager->persist($cat);
        $manager->flush();
    }
}
