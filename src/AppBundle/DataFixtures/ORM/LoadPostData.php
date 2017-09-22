<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 22:04
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Proxies\__CG__\AppBundle\Entity\Category;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\DataFixtures\ORM\LoadUserData;
use AppBundle\DataFixtures\ORM\LoadCategoryData;

class LoadPostData extends Fixture implements FixtureInterface, ContainerAwareInterface
{

    public function load(ObjectManager $manager)
    {
        // bin/console doctrine:fixtures:load -n --env=test

        for ($i = 0 ; $i < 10 ; $i++) {
            $post = new Post();
            $post->setTitle($i.'. Titre de l\'article');
            $post->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper orci elit, tincidunt bibendum arcu ullamcorper a. In bibendum non mauris ut elementum. Aliquam non sem malesuada, rhoncus dolor eget, pretium turpis. Nulla facilisi. Proin tempor erat sit amet tempor vehicula. Aliquam metus nisl, ultrices at elit at, pretium maximus neque. Sed eu bibendum felis. Donec convallis, leo non pretium fermentum, felis purus sollicitudin risus, vitae imperdiet ipsum sapien dignissim velit. Aliquam blandit et quam et lobortis. Nunc maximus libero sit amet sapien luctus, molestie maximus diam aliquam. Sed nec urna eu metus blandit commodo quis nec sem. ');
            $post->setCreatedAt(new \DateTime());
            $post->setAuthor($this->getReference('editor'));
            $post->setCategory($this->getReference('category'));
            $post->setImagelink('rs1.png');
            $post->setPublishedAt(new \DateTime());
            $post->setStatus(Post::PUBLISHED);
            $manager->persist($post);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            LoadUserData::class,
            LoadCategoryData::class
        );
    }
}