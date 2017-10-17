<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 18-08-17
 * Time: 20:44.
 */

namespace AppBundle\Service;

use AppBundle\Entity\Page;
use Doctrine\ORM\EntityManager;

class PageService
{
    protected $em;

    /**
     * PageService constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Find all sections of pages.
     *
     * @return Page[]|array
     */
    public function getSections()
    {
        $pages = $this->em->getRepository(Page::class)->findAll();

        return $pages;
    }

    /**
     * Get category ID from category name.
     *
     * @param $category
     *
     * @return int
     */
    public function getCategoryID($category)
    {
        switch ($category) {
            case 'formation':
                $id = Page::TRAINING;
                break;
            case 'expositions':
                $id = Page::EXHIBITION;
                break;
            case 'residence':
                $id = Page::RESIDENCY;
                break;
            case 'cours_collectifs':
                $id = Page::WORKSHOP;
                break;
            case 'cours_particuliers':
                $id = Page::TUTORING;
                break;
            case 'spectacles':
                $id = Page::ENTERTAINMENT;
                break;
            default:
                $id = Page::ENTERTAINMENT;
                break;
        }

        return $id;
    }
}
