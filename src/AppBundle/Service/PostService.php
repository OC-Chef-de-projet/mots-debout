<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 18-08-17
 * Time: 20:44.
 */

namespace AppBundle\Service;

use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class PostService
{
    protected $em;
    private $ts;

    public function __construct(EntityManager $em, TokenStorage $ts)
    {
        $this->em = $em;
        $this->ts = $ts;
    }

    /**
     * Mise à jour d'un article.
     *
     * @param Post $post Post entity
     * @param $form             Form
     *
     * @return bool
     */
    public function savePost(Post $post, Form $form)
    {
        $data = $form->getData();
        if ($data->getImagelink()) {
            $file = $post->getImagelink();
            if ($file) {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    './assets/img/',
                    $fileName
                );
                $post->setImagelink($fileName);
            }
        }
        $this->em->persist($post);
        $this->em->flush();

        return true;
    }

    /**
     * Création d'un article.
     *
     * @param Post $post Post
     * @param $form      Form
     */
    public function createPost(Post $post)
    {
        $user = $this->ts->getToken()->getUser();
        $post->setAuthor($user);
        $file = $post->getImagelink();
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move('./assets/img/', $fileName);
        $post->setImagelink($fileName);
        $this->em->persist($post);
        $this->em->flush();
    }

    /**
     * Titre pour l'action de modification ou de validation d'un article.
     *
     * @param User $user
     * @param Post $post
     *
     * @return string
     */
    public function getActionTitle(User $user, Post $post)
    {
        $title = 'Modification d\'un article';
        if ($post->getId() && in_array('ROLE_EDITOR', $user->getRoles())) {
            $title = 'Validation d\'un article de '.$post->getAuthor()->getName();
        }
        if ($post->getId() && in_array('ROLE_EDITOR', $user->getRoles()) && $post->getStatus() == Post::PUBLISHED) {
            $title = 'Article publié le '.$post->getPublishedAt()->format('d/m/Y');
        }

        return $title;
    }

    /**
     * @param User $user
     * @param $status
     *
     * @return Post[]|array
     */
    public function getPostsByRoleAndStatus(User $user, $status)
    {
        if ($status) {
            return $this->selectWithStatus($user, $status);
        }

        return $this->selectAllStatus($user);
    }

    /**
     * Select posts
     *  - contributor only contributor's posts
     *  - editor exclude contributor's draft.
     *
     * @param $user
     *
     * @return array
     */
    private function selectAllStatus(User $user)
    {
        $post_repo = $this->em->getRepository(Post::class);
        $queryBuilder = $post_repo->createQueryBuilder('p');
        $queryBuilder->select('p');

        // if contributor only contributor's posts
        if (in_array('ROLE_CONTRIBUTOR', $user->getRoles())) {
            $queryBuilder->where($queryBuilder->expr()->eq('p.author', ':user'))->setParameter('user', $user);
        }

        // if editor don't show contributor's draft
        if (in_array('ROLE_EDITOR', $user->getRoles())) {
            // where author_id = 14 or (author_id != 14 and status != 1)
            $queryBuilder->where($queryBuilder->expr()->eq('p.author', ':user'))
                ->orWhere(
                    $queryBuilder->expr()->andX(
                        $queryBuilder->expr()->neq('p.author', ':user2'),
                        $queryBuilder->expr()->neq('p.status', ':status')
                    )
                )

                ->setParameter('user', $user)
                ->setParameter('user2', $user)
                ->setParameter('status', Post::DRAFT);
        }

        $queryBuilder->orderBy('p.id', 'DESC');
        $query = $queryBuilder->getQuery();

        return $query->getResult();
    }

    /**
     * Select posts
     *  - contributor only contributor's posts with requested status
     *  - editor all post with requested status and exclude contributor's draft.
     *
     * @param $user
     * @param $status
     *
     * @return array
     */
    private function selectWithStatus(User $user, $status)
    {
        $post_repo = $this->em->getRepository(Post::class);
        $queryBuilder = $post_repo->createQueryBuilder('p');
        $queryBuilder->select('p');
        $queryBuilder->where('1 = 1');

        $queryBuilder->andwhere($queryBuilder->expr()->eq('p.status', ':status'))->setParameter('status', $status);

        if ($status == Post::DRAFT) {
            $queryBuilder->andwhere($queryBuilder->expr()->eq('p.author', ':user'))->setParameter('user', $user);
        }

        $queryBuilder->orderBy('p.id', 'DESC');
        $query = $queryBuilder->getQuery();

        return $query->getResult();
    }

    /**
     * Liste des status en fonction du type d'utilisateur et statuis du l'article.
     *
     * @param User      $user
     * @param Post|null $post
     *
     * @return array
     */
    public function getStatusOptions(User $user, Post $post)
    {
        $status = [];
        $status[Post::statusToString(Post::DRAFT)] = Post::DRAFT;

        if (in_array('ROLE_CONTRIBUTOR', $user->getRoles())) {
            $status[Post::statusToString(Post::TO_BE_VALIDATED)] = Post::TO_BE_VALIDATED;
        }
        if (in_array('ROLE_EDITOR', $user->getRoles())) {
            $status[Post::statusToString(Post::PUBLISHED)] = Post::PUBLISHED;
        }

        if ($post->getId() && in_array('ROLE_EDITOR', $user->getRoles())) {
            if ($post->getAuthor()->getId() != $user->getId()) {
                unset($status);
                $status[Post::statusToString(Post::TO_BE_VALIDATED)] = Post::TO_BE_VALIDATED;
                $status[Post::statusToString(Post::PUBLISHED)] = Post::PUBLISHED;
                $status[Post::statusToString(Post::REFUSED)] = Post::REFUSED;
            }
        }
        // Add current status
        if ($post->getId()) {
            $status[$post->getStatusString()] = $post->getStatus();
        }

        return $status;
    }

    public function getPostsCount(User $user)
    {
        $counts[0] = $this->getCount($user);
        $counts[Post::DRAFT] = $this->getCount($user, Post::DRAFT);
        $counts[Post::PUBLISHED] = $this->getCount($user, Post::PUBLISHED);
        $counts[Post::TO_BE_VALIDATED] = $this->getCount($user, Post::TO_BE_VALIDATED);
        $counts[Post::REFUSED] = $this->getCount($user, Post::REFUSED);

        return $counts;
    }

    private function getCount(User $user, $status = null)
    {
        $post_repo = $this->em->getRepository(Post::class);
        $queryBuilder = $post_repo->createQueryBuilder('f');
        $queryBuilder->select($queryBuilder->expr()->count('f'));
        $queryBuilder->where('1 = 1');
        if ($status) {
            $queryBuilder->andWhere('f.status = :status')->setParameter('status', $status);
        }
        if ($status == Post::DRAFT) {
            $queryBuilder->andWhere('f.author = :author')->setParameter('author', $user);
        }
        $query = $queryBuilder->getQuery();
        $singleScalar = $query->getSingleScalarResult();

        return $singleScalar;
    }
}
