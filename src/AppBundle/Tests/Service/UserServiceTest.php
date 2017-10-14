<?php
/**
 * Created by PhpStorm.
 * User: psa
 * Date: 14/10/17
 * Time: 11:02
 */

namespace Tests\AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Service\UserService;
use PHPUnit\Framework\TestCase;


class UserServiceTest extends TestCase
{
    public function testHaveView()
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);

        $us = new UserService();
        $this->assertFalse($us->haveView($user));

        $user->setRoles(['ROLE_CONTRIBUTOR']);
        $this->assertTrue($us->haveView($user));

    }

}
