<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
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
     * @ORM\OneToOne(targetEntity=Compte::class, mappedBy="uneinscription", cascade={"persist", "remove"})
     */
    private $uncompte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUncompte(): ?Compte
    {
        return $this->compte;
    }

    public function setUncompte(?Compte $compte): self
    {
        // unset the owning side of the relation if necessary
        if ($compte === null && $this->compte !== null) {
            $this->compte->setUneinscription(null);
        }

        // set the owning side of the relation if necessary
        if ($compte !== null && $compte->getUneinscription() !== $this) {
            $compte->setUneinscription($this);
        }

        $this->compte = $compte;

        return $this;
    }
}
