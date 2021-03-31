<?php

namespace App\Entity;

use App\Repository\VacationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacationsRepository::class)
 */
class Vacations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateheuredebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateheurefin;

    /**
     * @ORM\OneToMany(targetEntity=Atelier::class, mappedBy="unevacation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $desateliers;

    public function __construct()
    {
        $this->desateliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateheuredebut(): ?\DateTimeInterface
    {
        return $this->dateheuredebut;
    }

    public function setDateheuredebut(\DateTimeInterface $dateheuredebut): self
    {
        $this->dateheuredebut = $dateheuredebut;

        return $this;
    }

    public function getDateheurefin(): ?\DateTimeInterface
    {
        return $this->dateheurefin;
    }

    public function setDateheurefin(\DateTimeInterface $dateheurefin): self
    {
        $this->dateheurefin = $dateheurefin;

        return $this;
    }

    /**
     * @return Collection|Atelier[]
     */
    public function getDesateliers(): Collection
    {
        return $this->desateliers;
    }

    public function addDesatelier(Atelier $desatelier): self
    {
        if (!$this->desateliers->contains($desatelier)) {
            $this->desateliers[] = $desatelier;
            $desatelier->setUnevacation($this);
        }

        return $this;
    }

    public function removeDesatelier(Atelier $desatelier): self
    {
        if ($this->desateliers->removeElement($desatelier)) {
            // set the owning side to null (unless already changed)
            if ($desatelier->getUnevacation() === $this) {
                $desatelier->setUnevacation(null);
            }
        }

        return $this;
    }
}
