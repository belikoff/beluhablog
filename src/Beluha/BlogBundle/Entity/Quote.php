<?php

namespace Beluha\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\UserBundle\Entity\User;

/**
 * Quote
 *
 * @ORM\Table(name="quote")
 * @ORM\Entity(repositoryClass="Beluha\BlogBundle\Repository\QuoteRepository")
 */
class Quote
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
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;
    
    /**
     * @ORM\ManyToOne(targetEntity="AuthorQuote", inversedBy="quotes")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;
    
    /**
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\UserBundle\Entity\User", inversedBy="quotes")
     * @ORM\JoinColumn(name="by_added_id", referencedColumnName="id")
     */
    protected $by_added;


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
     * Set text
     *
     * @param string $text
     *
     * @return Quote
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set author
     *
     * @param \Beluha\BlogBundle\Entity\AuthorQuote $author
     *
     * @return Quote
     */
    public function setAuthor(\Beluha\BlogBundle\Entity\AuthorQuote $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Beluha\BlogBundle\Entity\AuthorQuote
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set byAdded
     *
     * @param \Application\Sonata\UserBundle\Entity\User:User $byAdded
     *
     * @return Quote
     */
    public function setByAdded(User $byAdded = null)
    {
        $this->by_added = $byAdded;
        
        return $this;
    }

    /**
     * Get byAdded
     *
     * @return \Application\Sonata\UserBundle\Entity\User:User
     */
    public function getByAdded()
    {
        return $this->by_added;
    }
}
