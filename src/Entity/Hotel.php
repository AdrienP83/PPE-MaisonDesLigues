<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HotelRepository::class)
 */
class Hotel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Nuite::class, mappedBy="unhotel")
     */
    private $desnuites;

    /**
     * @ORM\OneToMany(targetEntity=Proposer::class, mappedBy="unhotel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $despropositions;

    public function __construct()
    {
        $this->desnuites = new ArrayCollection();
        $this->despropositions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Nuite[]
     */
    public function getDesnuites(): Collection
    {
        return $this->desnuites;
    }

    public function addDesnuite(Nuite $desnuite): self
    {
        if (!$this->desnuites->contains($desnuite)) {
            $this->desnuites[] = $desnuite;
            $desnuite->setUnhotel($this);
        }

        return $this;
    }

    public function removeDesnuite(Nuite $desnuite): self
    {
        if ($this->desnuites->removeElement($desnuite)) {
            // set the owning side to null (unless already changed)
            if ($desnuite->getUnhotel() === $this) {
                $desnuite->setUnhotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Proposer[]
     */
    public function getDespropositions(): Collection
    {
        return $this->despropositions;
    }

    public function addDesproposition(Proposer $desproposition): self
    {
        if (!$this->despropositions->contains($desproposition)) {
            $this->despropositions[] = $desproposition;
            $desproposition->setUnhotel($this);
        }

        return $this;
    }

    public function removeDesproposition(Proposer $desproposition): self
    {
        if ($this->despropositions->removeElement($desproposition)) {
            // set the owning side to null (unless already changed)
            if ($desproposition->getUnhotel() === $this) {
                $desproposition->setUnhotel(null);
            }
        }

        return $this;
    }
}
