<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Page;
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
        return $this->render('@AdminPage/index.html.twig', array(
            'pages' => $pages,
            'admin' => 1
        ));
    }


    /**
     * Displays a form to edit an existing post entity.
     *
     */
    public function editAction(Request $request, Post $post, UserInterface $user)
    {


        if($post->getImagelink()) {
            $post->setImageLink(
                new File('./assets/img/' . $post->getImagelink())
            );
        }
        $PostService = $this->get('service_post');
        $form = $this->createForm(PostType::class, $post, ['status' => $PostService->getStatusOptions($user, $post)]);
        $form->handleRequest($request);

        $deleteForm = $this->createDeleteForm($post);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->container->get('service_post')->savePost($post, $form);
            return $this->redirectToRoute('admin_post_index');
        }

        return $this->render('@AdminPost/edit.html.twig', array(
            'title' => $this->container->get('service_post')->getActionTitle($user, $post),
            'post' => $post,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
            'admin' => 1
        ));
    }
}

