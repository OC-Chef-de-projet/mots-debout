<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Post;
use AppBundle\Form\Type\PostType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\File;

class PostController extends Controller
{

    /**
     * Lists all user entities.
     *
     */
    public function indexAction(Request $request)
    {
        $status = $request->get('id');
        $PostService = $this->get('service_post');
        $UserService = $this->get('service_user');
        $user = $this->getUser();

        $posts = $PostService->getPostsByRoleAndStatus($user, $status);

        return $this->render('@AdminPost/index.html.twig', array(
            'posts' => $posts,
            'view' => $UserService->haveView($user),
            'counts' => $PostService->getPostsCount($user),
            'admin' => 1
        ));
    }

    /**
     * Creates a new post entity.
     *
     */
    public function newAction(Request $request, UserInterface $user)
    {
        $PostService = $this->get('service_post');
        $post = new Post();

        $form = $this->createForm(PostType::class, $post, ['status' => $PostService->getStatusOptions($user, $post)]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->container->get('service_post')->createPost($post);
            return $this->redirectToRoute('admin_post_index');
        }

        return $this->render('@AdminPost/new.html.twig', array(
            'form' => $form->createView(),
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

    /**
     * Creates a form to delete a post entity.
     *
     * @param Post $post The post entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Deletes a post entity.
     *
     */
    public function deleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('admin_post_index');
    }

    /**
     * Finds and displays a post entity.
     *
     */
    public function showAction(Post $post)
    {

        return $this->render('@AdminPost/show.html.twig', array(
            'post' => $post,
        ));
    }

}

