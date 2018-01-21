<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EtmdController extends Controller
{
    public function indexAction()
    {
        return $this->render('etmd/index.html.twig');
    }
}
