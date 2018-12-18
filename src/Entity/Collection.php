<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CollectionRepository")
 */
class Collection
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="collections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Politic", inversedBy="collections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $politicid;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserid(): ?user
    {
        return $this->userid;
    }

    public function setUserid(?user $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getPoliticid(): ?Politic
    {
        return $this->politicid;
    }

    public function setPoliticid(?Politic $politicid): self
    {
        $this->politicid = $politicid;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
