<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Page;
use AppBundle\Entity\Pagesection;
use AppBundle\Form\RegistrationForm;
use AppBundle\Form\Type\UserType;
use AppBundle\Repository\PageRepository;
use AppBundle\Repository\PagesectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction($offset = 0)
    {

        $em = $this->getDoctrine()->getManager();
        return $this->render('default/index.html.twig', [
            'current' => $offset,
            'maxPages' => $em->getRepository('AppBundle:Post')->getPostCount(),
            'post' => $em->getRepository('AppBundle:Post')->getPost($offset),
        ]);
    }

    public function pageAction($category)
    {

        switch($category){
            case 'formation':
                $category = Page::TRAINING;
                break;
            case 'expositions':
                $category = Page::EXHIBITION;
                break;
            case 'residense':
                $category = Page::RESIDENCY;
                break;
            case 'cours_collectifs':
                $category = Page::WORKSHOP;
                break;
            case 'cours_particuliers':
                $category = Page::TUTORING;
                break;
            case 'spectacles':
                $category = Page::ENTERTAINMENT;
                break;
        }

        $em = $this->getDoctrine()->getManager();

        $header = $em->getRepository('AppBundle:Page')->getHeader($category);
        $sections = $em->getRepository('AppBundle:Pagesection')->getContents($header);
        return $this->render('default/page.html.twig', [
            'header' => $header,
            'sections' => $sections,
        ]);
    }

    public function contactusAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class,[
                'label' => 'Votre nom',
                'attr' => array('class' => 'validate  input-field'),
            ])
            ->add('email', EmailType::class,[
                'label' => 'Votre adresse email',
                'attr' => array('class' => 'validate input-field'),
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Votre message',
                'attr' => array(
                    'class' => 'materialize-textarea validate',
                ),
            ])
            ->add('send', SubmitType::class,[
                'label' => 'Envoyer'
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('service_mailer')->sendMessage($form->getData());
        }


        return $this->render(
            'default/contactus.html.twig',
            [
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
