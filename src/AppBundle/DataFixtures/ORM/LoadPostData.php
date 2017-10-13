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

            $post = new Post();
            $post->setTitle('C\'est les vacances');
            $post->setContent('ECOLE THEATRE MOTS DEBOUT vous souhaite un bel été
Vous souhaitez vous inscrire c\'est possible par mail tout l\'été, ou aussi par téléphone à partir du 1er septembre.
Belles vacances à tous mes élèves qui par impatience de reprendre nous verront réunis dès les 5 et 6 septembre');
            $post->setCreatedAt(new \DateTime());
            $post->setAuthor($this->getReference('editor'));
            $post->setCategory($this->getReference('category'));
            $post->setImagelink('vacances.png');
            $post->setPublishedAt(new \DateTime());
            $post->setStatus(Post::PUBLISHED);
            $manager->persist($post);


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