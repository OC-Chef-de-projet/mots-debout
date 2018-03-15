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

    public function formationsAction()
    {
        return $this->render('etmd/formations.html.twig');
    }

    public function residencesAction()
    {
        return $this->render('etmd/residences.html.twig');
    }

    public function expositionsAction()
    {
        return $this->render('etmd/expositions.html.twig');
    }

    public function spectaclesAction()
    {
        return $this->render('etmd/spectacles.html.twig');
    }

    public function stagesAction()
    {
        return $this->render('etmd/stages.html.twig');
    }

    public function ateliers_rechercheAction()
    {
        return $this->render('etmd/ateliers_recherche.html.twig');
    }

    public function ecoleAction()
    {
        return $this->render('etmd/ecole.html.twig');
    }

    public function nos_amisAction()
    {
        return $this->render('etmd/nos_amis.html.twig');
    }

    public function livre_orAction()
    {
        return $this->render('etmd/livre_or.html.twig');
    }

    public function mentions_legalesAction()
    {
        return $this->render('etmd/mentions_legales.html.twig');
    }


    public function nous_contacterAction()
    {
        return $this->render('etmd/nous_contacter.html.twig');
    }
}
