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
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LoadUserData extends Fixture implements FixtureInterface, ContainerAwareInterface
{



    public function load(ObjectManager $manager)
    {
        // bin/console doctrine:fixtures:load -n --env=test

        // Add admin
        $user = new User();
        $user->setName('Administrateur');
        $user->setEmail('admin@test.com');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $user->setPassword($encoder->encodePassword('test', $user->getSalt()));
        $user->addRole('ROLE_ADMIN');
        $manager->persist($user);


        // Add editor
        $user = new User();
        $user->setName('Editeur');
        $user->setEmail('edit@test.com');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $user->setPassword($encoder->encodePassword('test', $user->getSalt()));
        $user->addRole('ROLE_EDITOR');
        $manager->persist($user);
        $this->addReference('editor', $user);

        // Add contributor
        $user = new User();
        $user->setName('Contributeur');
        $user->setEmail('cont@test.com');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $user->setPassword($encoder->encodePassword('test', $user->getSalt()));
        $user->addRole('ROLE_CONTRIBUTOR');
        $manager->persist($user);

        $manager->flush();
    }
}