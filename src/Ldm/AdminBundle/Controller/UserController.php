<?php

namespace Ldm\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('LdmAdminBundle:User:index.html.twig');
    }
}
