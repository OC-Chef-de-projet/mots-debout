<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');

        $formLogin = $this->createForm(LoginType::class, ['_email' => $helper->getLastUsername()]);

        return $this->render('security/login.html.twig', [
            'form_login' => $formLogin->createView(),
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/login_check", name="security_login_check")
     */
    public function loginCheckAction()
    {

    }
}
