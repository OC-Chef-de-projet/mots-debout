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


class LoadPageData implements FixtureInterface, ContainerAwareInterface
{

    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // bin/console doctrine:fixtures:load -n --env=test

        $page = new Page();
        $page->setTitle('Titre formation');
        $page->setContent('Présentation de la formation');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::TRAINING);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);
        //$manager->flush();

        $page = new Page();
        $page->setTitle('Cours collectifs');
        $page->setContent('Présentation des cours collectifs');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::WORKSHOP);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Cours particuliers');
        $page->setContent('Présentation des cours particuliers');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::TUTORING);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Résidences');
        $page->setContent('Présentation des résidences');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::RESIDENCE);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Expositions');
        $page->setContent('Présentation des expositions');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::EXHIBITION);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);


        $page = new Page();
        $page->setTitle('Spectacles');
        $page->setContent('Présentation des spectacles');
        $page->setCover('grey-square.jpg');
        $page->setSection(Page::ENTERTAINMENT);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);



        $manager->flush();


    }
}