<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 19:35
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testEntity()
    {

        $user = new User();
        $user->setName('test');
        $this->assertEquals('test',$user->getName());

        $user->setEmail('test@test.com');
        $this->assertEquals('test@test.com',$user->getEmail());

        $user->setPassword('password');
        $this->assertEquals('password',$user->getPassword());

        $user->addRole('ROLE_ADMIN');
        $roles = $user->getRoles();
        $this->assertTrue(in_array('ROLE_ADMIN',$roles));


        $this->assertNull($user->getSalt());

        $this->assertEquals('test@test.com',$user->getUsername());

    }
}
