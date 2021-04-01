<?php

namespace App\Entity;

use App\Repository\QualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QualiteRepository::class)
 */
class Qualite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Licencie::class, mappedBy="unequalite")
     */
    private $deslicencies;

    public function __construct()
    {
        $this->deslicencies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Licencie[]
     */
    public function getDeslicencies(): Collection
    {
        return $this->deslicencies;
    }

    public function addDeslicency(Licencie $deslicency): self
    {
        if (!$this->deslicencies->contains($deslicency)) {
            $this->deslicencies[] = $deslicency;
            $deslicency->setUnequalite($this);
        }

        return $this;
    }

    public function removeDeslicency(Licencie $deslicency): self
    {
        if ($this->deslicencies->removeElement($deslicency)) {
            // set the owning side to null (unless already changed)
            if ($deslicency->getUnequalite() === $this) {
                $deslicency->setUnequalite(null);
            }
        }

        return $this;
    }
}
