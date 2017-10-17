<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    /**
     * Lists all user entities.
     */
    public function indexAction(Request $request)
    {
        $pages = $this->get('service_page')->getSections();

        return $this->render('@AdminPage/index.html.twig', [
            'pages' => $pages,
        ]);
    }
}
