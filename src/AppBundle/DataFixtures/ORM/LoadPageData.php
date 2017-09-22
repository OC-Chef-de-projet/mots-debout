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
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LoadPageData extends Fixture implements FixtureInterface, ContainerAwareInterface
{


    public function load(ObjectManager $manager)
    {
        // bin/console doctrine:fixtures:load -n --env=test

        $page = new Page();
        $page->setTitle('Titre formation');
        $page->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::TRAINING);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);
        $this->addReference('training', $page);


        $page = new Page();
        $page->setTitle('Cours collectifs');
        $page->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::WORKSHOP);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('workshop', $page);
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Cours particuliers');
        $page->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::TUTORING);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('tutoring', $page);
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Résidences');
        $page->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::RESIDENCY);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('residency', $page);
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Expositions');
        $page->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::EXHIBITION);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('exhibition', $page);
        $manager->persist($page);


        $page = new Page();
        $page->setTitle('Spectacles');
        $page->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::ENTERTAINMENT);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('entertainment', $page);
        $manager->persist($page);



        $manager->flush();


    }
}