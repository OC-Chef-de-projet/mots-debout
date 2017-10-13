<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($this->get('service_role')->isGranted('ROLE_ADMIN', $user)){
            return $this->redirectToRoute('admin_user_index');
        } else {
            return $this->redirectToRoute('admin_post_index');
        }
    }
}
