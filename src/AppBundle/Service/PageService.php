<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 18-08-17
 * Time: 20:44
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Page;
use AppBundle\Entity\Pagesection;
use Symfony\Component\Form\Form;


class PageService
{

    protected $em;
    private $ts;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getSections()
    {
        $pages = $this->em->getRepository(Page::class)->findAll();
        dump($pages);
        return $pages;
    }
}
