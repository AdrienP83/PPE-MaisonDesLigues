<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
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
     * @ORM\ManyToMany(targetEntity=Atelier::class, mappedBy="desthemes")
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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $desatelier->addDestheme($this);
        }

        return $this;
    }

    public function removeDesatelier(Atelier $desatelier): self
    {
        if ($this->desateliers->removeElement($desatelier)) {
            $desatelier->removeDestheme($this);
        }

        return $this;
    }

    public function __toString() {
        return $this->getLibelle();
    }
}
