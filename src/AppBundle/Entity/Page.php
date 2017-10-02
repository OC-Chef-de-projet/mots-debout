<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PageService
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageRepository")
 */
class Page
{


    const TUTORING = 1;
    const EXHIBITION = 2;
    const ENTERTAINMENT = 3;
    const WORKSHOP = 4;
    const RESIDENCY = 5;
    const TRAINING = 6;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", nullable=true)
     */
    private $cover;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetimetz")
     */
    private $createdAt;


    /**
     * @ORM\OneToMany(targetEntity="Pagesection", mappedBy="page", cascade={"all"}, orphanRemoval=true)
     */
    private $pagesections;

    /**
     * @var int
     *
     * @ORM\Column(name="section", type="integer")
     * @Assert\Choice(choices = {Page::TUTORING, Page::EXHIBITION, Page::ENTERTAINMENT, Page::WORKSHOP, Page::RESIDENCY, Page::TRAINING },strict = true)
     */
    private $section;


    public function __construct()
    {
        $this->pagesections = new ArrayCollection();
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Page
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Page
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set section
     *
     * @param integer $section
     *
     * @return Page
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return integer
     */
    public function getSection()
    {
        return $this->section;
    }

    public function getSectionString(){
        return self::sectionToString($this->section);
    }

    public static function sectionToString($section){
        switch ($section){
            case self::TRAINING:
                return 'Formations';

            case self::WORKSHOP:
                return 'Cours collectifs';

            case self::TUTORING:
                return 'Cours particuliers';

            case self::RESIDENCY:
                return 'Résidence';

            case self::ENTERTAINMENT:
                return 'Spectacles';

            case self::EXHIBITION:
                return 'Expositions';

            default:
                return 'Erreur';
        }
    }

    /**
     * Add pagesection
     *
     * @param \AppBundle\Entity\Pagesection $pagesection
     *
     * @return Page
     */
    public function addPagesection(\AppBundle\Entity\Pagesection $pagesection)
    {
        $this->pagesections[] = $pagesection;

        return $this;
    }

    /**
     * Remove pagesection
     *
     * @param \AppBundle\Entity\Pagesection $pagesection
     */
    public function removePagesection(\AppBundle\Entity\Pagesection $pagesection)
    {
        $this->pagesections->removeElement($pagesection);
    }

    /**
     * Get pagesections
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagesections()
    {
        return $this->pagesections;
    }
}


