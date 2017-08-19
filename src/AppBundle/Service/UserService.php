<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 18-08-17
 * Time: 20:44
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\User;


class UserService
{

    protected $em;
    protected $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository(User::class);
    }

    public function haveView(User $user)
    {
        $haveView = false;
        if(in_array('ROLE_CONTRIBUTOR', $user->getRoles())) {
            $haveView = true;
        }
        return $haveView;
    }
}
