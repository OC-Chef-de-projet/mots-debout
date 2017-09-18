<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;

use AppBundle\Form\RegistrationForm;
use AppBundle\Form\Type\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'post' => $em->getRepository('AppBundle:Post')->getLastPost()
        ]);
    }

    public function tutoringAction(Request $request)
    {
        $header = [
            'title' => 'Cours particuliers',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'cover' => 'rs1.png'
        ];
        $sections = [
            0 => [
                'imagelink' => 'etmd.jpg',
                'title' => '1. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ],
            1 => [
                'imagelink' => 'etmd.jpg',
                'title' => '2. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ]

        ];
        return $this->render('default/page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'header' => $header,
            'sections' => $sections
        ]);
    }

    public function exhibitionsAction(Request $request)
    {
        $header = [
            'title' => 'Expositions',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'cover' => 'rs1.png'
        ];
        $sections = [
            0 => [
                'imagelink' => 'etmd.jpg',
                'title' => '1. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ],
            1 => [
                'imagelink' => 'etmd.jpg',
                'title' => '2. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ]

        ];
        return $this->render('default/page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'header' => $header,
            'sections' => $sections
        ]);
    }

    public function entertainmentAction(Request $request)
    {
        $header = [
            'title' => 'Spectacles',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'cover' => 'rs1.png'
        ];
        $sections = [
            0 => [
                'imagelink' => 'etmd.jpg',
                'title' => '1. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ],
            1 => [
                'imagelink' => 'etmd.jpg',
                'title' => '2. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ]

        ];
        return $this->render('default/page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'header' => $header,
            'sections' => $sections
        ]);
    }




    public function workshopAction(Request $request)
    {
        $header = [
            'title' => 'Cours collectifs',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'cover' => 'rs1.png'
        ];
        $sections = [
            0 => [
                'imagelink' => 'etmd.jpg',
                'title' => '1. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ],
            1 => [
                'imagelink' => 'etmd.jpg',
                'title' => '2. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ]

        ];
        return $this->render('default/page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'header' => $header,
            'sections' => $sections
        ]);
    }

    
    public function residenceAction(Request $request)
    {
        $header = [
            'title' => 'Résidences',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'cover' => 'rs1.png'
            ];
        $sections = [
            0 => [
             'imagelink' => 'etmd.jpg',
             'title' => '1. Lorem ipsum dolor sit amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ],
            1 => [
                'imagelink' => 'etmd.jpg',
                'title' => '2. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ]

        ];
        return $this->render('default/page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'header' => $header,
            'sections' => $sections
        ]);
    }

    public function trainingAction(Request $request)
    {
        $header = [
            'title' => 'Formations',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'cover' => 'rs1.png'
        ];
        $sections = [
            0 => [
                'imagelink' => 'etmd.jpg',
                'title' => '1. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ],
            1 => [
                'imagelink' => 'etmd.jpg',
                'title' => '2. Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo mi, et imperdiet tortor condimentum sed. Duis lectus ligula, ultricies sed aliquet in, pretium nec nisi. Aenean sit amet odio odio. Sed rutrum maximus neque, sed posuere magna rhoncus eu. Vestibulum non scelerisque nisi, et feugiat eros. Maecenas a odio id nisl accumsan congue. Sed tempus ante nibh, vitae volutpat nulla suscipit nec. Vivamus convallis felis in lorem tristique, ut feugiat orci mattis. Fusce sed augue rhoncus, malesuada nisl non, ullamcorper tellus. Donec vel volutpat nisl, ut commodo sapien.'
            ]

        ];
        return $this->render('default/page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'header' => $header,
            'sections' => $sections
        ]);
    }

    public function contactusAction(Request $request)
    {
        return $this->render('default/contactus.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
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
