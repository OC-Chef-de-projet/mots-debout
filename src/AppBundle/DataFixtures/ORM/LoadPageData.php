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
        $page->setTitle('Formation');
        $page->setContent('Un grand acteur, c\'est quelqu\'un qui est capable d\'être intime en public. (Constantin Stanislavski)');
        $page->setCover('fond-cat.jpg');
        $page->setSection(Page::TRAINING);
        $page->setCreatedAt(new \DateTime());
        $manager->persist($page);
        $this->addReference('training', $page);


        $page = new Page();
        $page->setTitle('Cours collectifs');
        $page->setContent('Le théâtre n\'est pas chargé de représenter la psychologie, mais les passions, c\'est tout autre chose. (Ariane-Mnouchkine)');
        $page->setCover('fond-cat.jpg');
        $page->setSection(Page::WORKSHOP);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('workshop', $page);
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Cours particuliers');
        $page->setContent('Le théâtre est pour chacun le reflet de sa propre fragilité. (Dominique Desanti)');
        $page->setCover('fond-cat.jpg');
        $page->setSection(Page::TUTORING);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('tutoring', $page);
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Résidences');
        $page->setContent('Le théâtre est une nourriture aussi indispensable à la vie que le pain et le vin… Le théâtre est donc, au premier chef, un service public. Tout comme le gaz, l’eau, l\'électricité. Jean Vilar');
        $page->setCover('fond-cat.jpg');
        $page->setSection(Page::RESIDENCY);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('residency', $page);
        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Expositions');
        $page->setContent('Chaque fois, une exposition est une sorte de question posée. (Christian Boltanski)');
        $page->setCover('fond-cat.jpg');
        $page->setSection(Page::EXHIBITION);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('exhibition', $page);
        $manager->persist($page);


        $page = new Page();
        $page->setTitle('Spectacles');
        $page->setContent('Toute représentation théâtrale, tout festival de théâtre est un acte d\'humanisme, un rempart contre la barbarie.(Jean-Paul Alègre)');
        $page->setCover('fond-cat.jpg');
        $page->setSection(Page::ENTERTAINMENT);
        $page->setCreatedAt(new \DateTime());
        $this->addReference('entertainment', $page);
        $manager->persist($page);
        $manager->flush();
    }
}
