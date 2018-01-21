<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    public function IndexAction()
    {
        // Load data

        return $this->render('training/index.html.twig',[
            'trainings' => $this->getDoctrine()->getManager()->getRepository('AppBundle:Training')->upcoming()
        ]);
    }
}
