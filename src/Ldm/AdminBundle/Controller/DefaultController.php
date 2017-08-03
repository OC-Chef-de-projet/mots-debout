<?php

namespace Ldm\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LdmAdminBundle:Default:index.html.twig');
    }
}
