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
        if($status){
            return $this->selectWithStatus($user, $status);
        }
        return $this->selectAllStatus($user);
    }

    /**
     * Select posts
     *  - contributor only contributor's posts
     *  - editor exclude contributor's draft
     * @param $user
     * @return array
     */
    private function selectAllStatus(User $user)
    {
        $queryBuilder = $this->repository->createQueryBuilder('p');
        $queryBuilder->select('p');

        // if contributor only contributor's posts
        if(in_array('ROLE_CONTRIBUTOR', $user->getRoles())) {
            $queryBuilder->where($queryBuilder->expr()->eq('p.author',':user'))->setParameter('user', $user);

        }

        // if editor don't show contributor's draft
        if(in_array('ROLE_EDITOR', $user->getRoles())) {
            // where author_id = 14 or (author_id != 14 and status != 1)
            $queryBuilder->where($queryBuilder->expr()->eq('p.author',':user'))
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
     *  - editor all post with requested status and exclude contributor's draft
     * @param $user
     * @param $status
     * @return array
     */
    private function selectWithStatus(User $user,$status)
    {


        $queryBuilder = $this->repository->createQueryBuilder('p');
        $queryBuilder->select('p');
        $queryBuilder->where('1 = 1');

        $queryBuilder->andwhere($queryBuilder->expr()->eq('p.status',':status'))->setParameter('status', $status);

        if($status == Post::DRAFT){
            $queryBuilder->andwhere($queryBuilder->expr()->eq('p.author',':user'))->setParameter('user', $user);
        }


        $queryBuilder->orderBy('p.id', 'DESC');
        $query = $queryBuilder->getQuery();
        return $query->getResult();
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

        $queryBuilder = $this->repository->createQueryBuilder('f');
        $queryBuilder->select($queryBuilder->expr()->count('f'));
        $queryBuilder->where('1 = 1');
        if($status) {
            $queryBuilder->andWhere('f.status = :status')->setParameter('status', $status);
        }
        if($status == Post::DRAFT){
            $queryBuilder->andWhere('f.author = :author')->setParameter('author', $user);
        }
        $query = $queryBuilder->getQuery();
        $singleScalar = $query->getSingleScalarResult();
        return $singleScalar;
    }
}
