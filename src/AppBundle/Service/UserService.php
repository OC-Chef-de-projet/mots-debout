<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 18-08-17
 * Time: 20:44.
 */

namespace AppBundle\Service;

use AppBundle\Entity\User;

class UserService
{
    public function haveView(User $user)
    {
        $haveView = false;
        if (in_array('ROLE_CONTRIBUTOR', $user->getRoles())) {
            $haveView = true;
        }

        return $haveView;
    }
}
