<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 19:35.
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Newsletter;

class NewsletterTest extends \PHPUnit_Framework_TestCase
{
    public function testEntity()
    {
        $nl = new Newsletter();
        $nl->setEmail('nobody@nowhere.com');
        $this->assertEquals('nobody@nowhere.com', $nl->getEmail());
    }
}
