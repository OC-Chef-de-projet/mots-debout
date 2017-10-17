<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 19:35.
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Category;
use AppBundle\Entity\Post;
use AppBundle\Entity\User;

class PostTest extends \PHPUnit_Framework_TestCase
{
    public function testEntity()
    {
        $post = new Post();

        $post->setContent('CONTENT');
        $this->assertEquals('CONTENT', $post->getContent());

        $post->setTitle('TITLE');
        $this->assertEquals('TITLE', $post->getTitle());

        $date = new \DateTime('now');
        $post->setPublishedAt($date);
        $this->assertEquals($date, $post->getPublishedAt());

        $date = new \DateTime('now');
        $post->setCreatedAt($date);
        $this->assertEquals($date, $post->getCreatedAt());

        $post->setStatus(Post::REFUSED);
        $this->assertEquals(Post::REFUSED, $post->getStatus());
        $this->assertEquals('Refusé', $post->getStatusString());

        $post->setStatus(Post::PUBLISHED);
        $this->assertEquals(Post::PUBLISHED, $post->getStatus());
        $this->assertEquals('Publié', $post->getStatusString());

        $post->setStatus(Post::DRAFT);
        $this->assertEquals(Post::DRAFT, $post->getStatus());
        $this->assertEquals('Brouillon', $post->getStatusString());

        $post->setStatus(Post::TO_BE_VALIDATED);
        $this->assertEquals(Post::TO_BE_VALIDATED, $post->getStatus());
        $this->assertEquals('A valider', $post->getStatusString());

        $user = new User();
        $user->setName('TESTNAME');
        $post->setAuthor($user);
        $this->assertEquals('TESTNAME', $post->getAuthor()->getName());

        $category = new Category();
        $category->setName('CATNAME');
        $post->setCategory($category);
        $this->assertEquals('CATNAME', $post->getCategory()->getName());

        $post->setImagelink('IMAGELINK');
        $this->assertEquals('IMAGELINK', $post->getImagelink());
    }
}
