<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PrivateLessonsController extends Controller
{
    public function IndexAction()
    {
        return $this->render('privateLessons/index.html.twig');
    }
}
