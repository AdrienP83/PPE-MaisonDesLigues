<?php

namespace App\Entity;

use App\Repository\NuiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NuiteRepository::class)
 */
class Nuite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datenuit;

    /**
     * @ORM\ManyToOne(targetEntity=Inscription::class, inversedBy="desnuites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $uneinscription;

    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class, inversedBy="desnuites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unhotel;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieChambre::class, inversedBy="desnuites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unecategoriechambre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatenuit(): ?\DateTimeInterface
    {
        return $this->datenuit;
    }

    public function setDatenuit(\DateTimeInterface $datenuit): self
    {
        $this->datenuit = $datenuit;

        return $this;
    }

    public function getUneinscription(): ?Inscription
    {
        return $this->uneinscription;
    }

    public function setUneinscription(?Inscription $uneinscription): self
    {
        $this->uneinscription = $uneinscription;

        return $this;
    }

    public function getUnhotel(): ?Hotel
    {
        return $this->unhotel;
    }

    public function setUnhotel(?Hotel $unhotel): self
    {
        $this->unhotel = $unhotel;

        return $this;
    }

    public function getUnecategoriechambre(): ?CategorieChambre
    {
        return $this->unecategoriechambre;
    }

    public function setUnecategoriechambre(?CategorieChambre $unecategoriechambre): self
    {
        $this->unecategoriechambre = $unecategoriechambre;

        return $this;
    }
}
