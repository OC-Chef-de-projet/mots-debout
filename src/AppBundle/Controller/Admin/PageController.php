<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Page;
use AppBundle\Entity\Post;
use AppBundle\Form\Type\PageType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\File;

class PageController extends Controller
{

    /**
     * Lists all user entities.
     *
     */
    public function indexAction(Request $request)
    {
        $pages = $this->get('service_page')->getSections();
        return $this->render('@AdminPage/index.html.twig', [
            'pages' => $pages,
        ]);
    }
}

