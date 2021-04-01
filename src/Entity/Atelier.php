<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AtelierRepository::class)
 */
class Atelier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbplacesmaxi;

    /**
     * @ORM\ManyToMany(targetEntity=Inscription::class, mappedBy="desateliers")
     */
    private $desinscriptions;

    /**
     * @ORM\ManyToOne(targetEntity=Vacations::class, inversedBy="desateliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unevacation;

    /**
     * @ORM\ManyToMany(targetEntity=Theme::class, inversedBy="desateliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $desthemes;

    public function __construct()
    {
        $this->desinscriptions = new ArrayCollection();
        $this->desthemes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNbplacesmaxi(): ?int
    {
        return $this->nbplacesmaxi;
    }

    public function setNbplacesmaxi(int $nbplacesmaxi): self
    {
        $this->nbplacesmaxi = $nbplacesmaxi;

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getDesinscriptions(): Collection
    {
        return $this->desinscriptions;
    }

    public function addDesinscription(Inscription $desinscription): self
    {
        if (!$this->desinscriptions->contains($desinscription)) {
            $this->desinscriptions[] = $desinscription;
            $desinscription->addDesatelier($this);
        }

        return $this;
    }

    public function removeDesinscription(Inscription $desinscription): self
    {
        if ($this->desinscriptions->removeElement($desinscription)) {
            $desinscription->removeDesatelier($this);
        }

        return $this;
    }

    public function getUnevacation(): ?Vacations
    {
        return $this->unevacation;
    }

    public function setUnevacation(?Vacations $unevacation): self
    {
        $this->unevacation = $unevacation;

        return $this;
    }

    /**
     * @return Collection|Theme[]
     */
    public function getDesthemes(): Collection
    {
        return $this->desthemes;
    }

    public function addDestheme(Theme $destheme): self
    {
        if (!$this->desthemes->contains($destheme)) {
            $this->desthemes[] = $destheme;
        }

        return $this;
    }

    public function removeDestheme(Theme $destheme): self
    {
        $this->desthemes->removeElement($destheme);

        return $this;
    }
}
