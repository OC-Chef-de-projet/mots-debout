<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;

class RoleService
{
    private $roleHierarchy;

    /**
     * Constructor.
     *
     * @param RoleHierarchyInterface $roleHierarchy
     */
    public function __construct(RoleHierarchyInterface $roleHierarchy)
    {
        $this->roleHierarchy = $roleHierarchy;
    }

    /**
     * isGranted.
     *
     * @param string $role
     * @param $user
     *
     * @return bool
     */
    public function isGranted($role, User $user)
    {
        $role = new Role($role);

        foreach ($user->getRoles() as $userRole) {
            if (in_array($role, $this->roleHierarchy->getReachableRoles([new Role($userRole)]))) {
                return true;
            }
        }

        return false;
    }
}
