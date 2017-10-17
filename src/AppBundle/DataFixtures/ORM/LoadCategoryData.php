<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 22:04.
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends Fixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cat = new Category();
        $cat->setName('CATEGORIE 1');
        $manager->persist($cat);

        $cat = new Category();
        $cat->setName('CATEGORIE 2');
        $manager->persist($cat);
        $this->addReference('category', $cat);

        $cat = new Category();
        $cat->setName('CATEGORIE 3');
        $manager->persist($cat);

        $manager->flush();
    }
}
