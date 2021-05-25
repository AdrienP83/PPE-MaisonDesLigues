<?php

namespace App\Entity;

use App\Repository\CategorieChambreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieChambreRepository::class)
 */
class CategorieChambre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Nuite::class, mappedBy="unecategoriechambre")
     */
    private $desnuites;

    /**
     * @ORM\OneToMany(targetEntity=Proposer::class, mappedBy="unechambre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $desPropositions;

    public function __construct()
    {
        $this->desnuites = new ArrayCollection();
        $this->desPropositions = new ArrayCollection();
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
            $desnuite->setUnecategoriechambre($this);
        }

        return $this;
    }

    public function removeDesnuite(Nuite $desnuite): self
    {
        if ($this->desnuites->removeElement($desnuite)) {
            // set the owning side to null (unless already changed)
            if ($desnuite->getUnecategoriechambre() === $this) {
                $desnuite->setUnecategoriechambre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Proposer[]
     */
    public function getDesPropositions(): Collection
    {
        return $this->desPropositions;
    }

    public function addDesProposition(Proposer $desProposition): self
    {
        if (!$this->desPropositions->contains($desProposition)) {
            $this->desPropositions[] = $desProposition;
            $desProposition->setUnechambre($this);
        }

        return $this;
    }

    public function removeDesProposition(Proposer $desProposition): self
    {
        if ($this->desPropositions->removeElement($desProposition)) {
            // set the owning side to null (unless already changed)
            if ($desProposition->getUnechambre() === $this) {
                $desProposition->setUnechambre(null);
            }
        }

        return $this;
    }
}
