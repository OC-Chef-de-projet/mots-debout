<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ContactusType;
use AppBundle\Entity\Page;
use AppBundle\Entity\User;
use AppBundle\Form\RegistrationForm;
use AppBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction($offset = 0, $page = 1)
    {

        $em = $this->getDoctrine()->getManager();
        return $this->render('default/index.html.twig', [
            'current' => $offset,
            'maxPages' => $em->getRepository('AppBundle:Post')->getPostCount(),
            'post' => $em->getRepository('AppBundle:Post')->getPost($offset)
        ]);
    }

    public function pageAction($category)
    {

        $em = $this->getDoctrine()->getManager();


        $categoryID = $this->get('service_page')->getCategoryID($category);


        $header = $em->getRepository('AppBundle:Page')->getHeader($categoryID);
        $sections = $em->getRepository('AppBundle:Pagesection')->getContents($header);
        return $this->render('default/page.html.twig', [
            'header' => $header,
            'sections' => $sections,
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function contactusAction(Request $request)
    {

        $form = $this->createForm(ContactusType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('service_mailer')->sendMessage($form->getData());
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/contactus.html.twig', [
                'form' => $form->createView()
            ]
        );
    }


    /**
     *
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $encoder = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // Set their role
            $user->setRole('ROLE_USER');

            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('security_login');
        }


        return $this->render('admin/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

}
