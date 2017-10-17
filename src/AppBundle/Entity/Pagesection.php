<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PagesectionService.
 *
 * @ORM\Table(name="pagesection")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PagesectionRepository")
 */
class Pagesection
{
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
     * @ORM\Column(name="imagelink", type="string", nullable=true)
     */
    private $imagelink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="sortorder", type="integer")
     */
    private $sortorder;

    /**
     * @var Page
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Page", fetch="EAGER", inversedBy="pagesections", cascade={"persist"})
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    private $page;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Pagesection
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Pagesection
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set imagelink.
     *
     * @param string $imagelink
     *
     * @return Pagesection
     */
    public function setImagelink($imagelink)
    {
        $this->imagelink = $imagelink;

        return $this;
    }

    /**
     * Get imagelink.
     *
     * @return string
     */
    public function getImagelink()
    {
        return $this->imagelink;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Pagesection
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set sortorder.
     *
     * @param int $sortorder
     *
     * @return Pagesection
     */
    public function setSortorder($sortorder)
    {
        $this->sortorder = $sortorder;

        return $this;
    }

    /**
     * Get sortorder.
     *
     * @return int
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }

    /**
     * Set page.
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Pagesection
     */
    public function setPage(\AppBundle\Entity\Page $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page.
     *
     * @return \AppBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }
}
