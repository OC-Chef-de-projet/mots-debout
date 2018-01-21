<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassroomController extends Controller
{
    public function IndexAction()
    {
        // Load data

        return $this->render('classroom/index.html.twig');
    }
}
