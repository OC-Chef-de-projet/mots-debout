<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 18-08-17
 * Time: 20:44
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Post;
use AppBundle\Entity\User;


class PostService
{

    protected $em;
    protected $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository(Post::class);
    }

    /**
     * Titre pour l'action de modification ou de validation d'un article
     *
     * @param User $user
     * @param Post $post
     * @return string
     */
    public function getActionTitle(User $user, Post $post)
    {
        $title = 'Modification d\'un article';
        if($post->getId() && in_array('ROLE_EDITOR', $user->getRoles())){
            $title = 'Validation d\'un article de '.$post->getAuthor()->getName();
        }
        if($post->getId() && in_array('ROLE_EDITOR', $user->getRoles()) && $post->getStatus() == Post::PUBLISHED){
            $title = 'Article publié le '.$post->getPublishedAt()->format('d/m/Y');
        }
        return $title;
    }

    /**
     * @param User $user
     * @param $status
     * @return Post[]|array
     */
    public function getPostsByRoleAndStatus(User $user, $status)
    {
        $conditions = [];

        if($status == 0){
            $status = [
                Post::DRAFT,
                Post::PUBLISHED,
                Post::TO_BE_VALIDATED,
                Post::REFUSED
            ];
        }

        $conditions['status'] = $status;

        if(in_array('ROLE_CONTRIBUTOR', $user->getRoles())) {
            $conditions['author'] = $user;
        }

        $posts = $this->repository->findBy(
            $conditions,
            [
                'id' => 'DESC'
            ]
        );
        return $posts;
    }

    /**
     * Liste des status en fonction du type d'utilisateur et statuis du l'article
     *
     * @param User $user
     * @param Post|null $post
     * @return array
     */
    public function getStatusOptions(User $user,Post $post)
    {
        $status = array();
        $status[ Post::statusToString(Post::DRAFT) ] = Post::DRAFT;

        if(in_array('ROLE_CONTRIBUTOR', $user->getRoles())) {
            $status[ Post::statusToString(Post::TO_BE_VALIDATED) ] = Post::TO_BE_VALIDATED;
        }
        if(in_array('ROLE_EDITOR', $user->getRoles())) {
            $status[ Post::statusToString(Post::PUBLISHED) ] = Post::PUBLISHED;
        }

        if($post->getId() && in_array('ROLE_EDITOR', $user->getRoles())){
            if($post->getAuthor()->getId() != $user->getId()){
                unset($status);
                $status[ Post::statusToString(Post::TO_BE_VALIDATED) ] = Post::TO_BE_VALIDATED;
                $status[ Post::statusToString(Post::PUBLISHED) ] = Post::PUBLISHED;
                $status[ Post::statusToString(Post::REFUSED) ] = Post::REFUSED;
            }
        }
        // Add current status
        if($post->getId()){
            $status[ $post->getStatusString() ] = $post->getStatus();
        }
        return $status;
    }

    public function getPostsCount(User $user)
    {
        $counts[0] = $this->getCount($user);
        $counts[Post::DRAFT] = $this->getCount($user, Post::DRAFT);
        $counts[Post::PUBLISHED] =$this->getCount($user, Post::PUBLISHED);
        $counts[Post::TO_BE_VALIDATED] = $this->getCount($user, Post::TO_BE_VALIDATED);
        $counts[Post::REFUSED] = $this->getCount($user, Post::REFUSED);
        return $counts;
    }

    private function getCount(User $user,$status = null)
    {

        $withUser = true;
        if(in_array('ROLE_EDITOR', $user->getRoles())) {
            $withUser = false;
        }
        $queryBuilder = $this->repository->createQueryBuilder('f');
        $queryBuilder->select($queryBuilder->expr()->count('f'));

        $queryBuilder->where('1 = 1');
        if($withUser) {
            $queryBuilder->andWhere('f.author = :author')->setParameter('author', $user);
        }
        if($status){
            $queryBuilder->andWhere('f.status = :status')->setParameter('status', $status);
        }

        $query = $queryBuilder->getQuery();
        $singleScalar = $query->getSingleScalarResult();
        return $singleScalar;
    }
}