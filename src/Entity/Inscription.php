<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Compte::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $uncompte;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="desinscriptions")
     */
    private $unereservation;

    /**
     * @ORM\OneToMany(targetEntity=Nuite::class, mappedBy="uneinscription")
     */
    private $desnuites;

    /**
     * @ORM\ManyToMany(targetEntity=Atelier::class, inversedBy="desinscriptions")
     */
    private $desateliers;

    public function __construct()
    {
        $this->unereservation = new ArrayCollection();
        $this->desnuites = new ArrayCollection();
        $this->desateliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUncompte(): ?Compte
    {
        return $this->uncompte;
    }

    public function setUncompte(Compte $uncompte): self
    {
        $this->uncompte = $uncompte;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getUnereservation(): Collection
    {
        return $this->unereservation;
    }

    public function addUnereservation(Reservation $unereservation): self
    {
        if (!$this->unereservation->contains($unereservation)) {
            $this->unereservation[] = $unereservation;
            $unereservation->setDesinscriptions($this);
        }

        return $this;
    }

    public function removeUnereservation(Reservation $unereservation): self
    {
        if ($this->unereservation->removeElement($unereservation)) {
            // set the owning side to null (unless already changed)
            if ($unereservation->getDesinscriptions() === $this) {
                $unereservation->setDesinscriptions(null);
            }
        }

        return $this;
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
            $desnuite->setUneinscription($this);
        }

        return $this;
    }

    public function removeDesnuite(Nuite $desnuite): self
    {
        if ($this->desnuites->removeElement($desnuite)) {
            // set the owning side to null (unless already changed)
            if ($desnuite->getUneinscription() === $this) {
                $desnuite->setUneinscription(null);
            }
        }

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
        }

        return $this;
    }

    public function removeDesatelier(Atelier $desatelier): self
    {
        $this->desateliers->removeElement($desatelier);

        return $this;
    }
}
