<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegistrationForm;
use AppBundle\Form\Type\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsletterController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function subscribeAction(Request $request)
    {
        $form = $this->createForm(NewsletterType::class, null, array(
            'action' => $this->generateUrl('newsletter_subscribe'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if($request->isXmlHttpRequest()) {
            $response = $this->get('service_newsletter')->subscribe($request->request->get('email'));
            return new JsonResponse($response);
        }


        return $this->render('default/newsletter.html.twig', [
                'form' => $form->createView()
            ]
        );

    }

}
