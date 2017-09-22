<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 22:04
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Pagesection;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Page;
use AppBundle\DataFixtures\ORM\LoadSectionData;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LoadPagesectionData extends Fixture implements FixtureInterface, ContainerAwareInterface
{


    public function load(ObjectManager $manager)
    {
        // bin/console doctrine:fixtures:load -n --env=test


        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $section->setTitle('1. Titre Formations');
        $section->setSortorder(1);
        $section->setPage($this->getReference('training'));
        $manager->persist($section);

        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $section->setTitle('2. Titre Formations');
        $section->setSortorder(1);
        $section->setPage($this->getReference('training'));
        $manager->persist($section);


        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $section->setTitle('1. Titre Cours collectifs');
        $section->setSortorder(1);
        $section->setPage($this->getReference('workshop'));
        $manager->persist($section);

        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $section->setTitle('1. Titre Cours particuliers');
        $section->setSortorder(1);
        $section->setPage($this->getReference('tutoring'));
        $manager->persist($section);

        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $section->setTitle('1. Titre Résidences');
        $section->setSortorder(1);
        $section->setPage($this->getReference('residency'));
        $manager->persist($section);

        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $section->setTitle('1. Titre Expositions');
        $section->setSortorder(1);
        $section->setPage($this->getReference('exhibition'));
        $manager->persist($section);

        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
        $section->setTitle('1. Titre Spectacles');
        $section->setSortorder(1);
        $section->setPage($this->getReference('entertainment'));
        $manager->persist($section);

        $manager->flush();

    }

    public function getDependencies()
    {
        return array(
            LoadPageData::class
        );
    }
}