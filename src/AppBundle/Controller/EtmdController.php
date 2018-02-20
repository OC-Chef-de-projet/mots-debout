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

    public function AteliersAction()
    {
        return $this->render('etmd/ateliers.html.twig',[
            'trainings' => $this->getDoctrine()->getManager()->getRepository('AppBundle:Training')->upcoming()
        ]);
    }

    public function cours_collectifsAction()
    {
        return $this->render('etmd/cours_collectifs.html.twig');
    }

    public function cours_particuliersAction()
    {
        return $this->render('etmd/cours_particuliers.html.twig');
    }
}
