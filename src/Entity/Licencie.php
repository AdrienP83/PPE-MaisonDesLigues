<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=LicencieRepository::class)
 */
class Licencie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numlicenceunique;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     * message = "{{ value }}' n'est pas une adresse mail valide"
     * )
     */
    private $mail;

    /**
     * @ORM\OneToOne(targetEntity=Compte::class, cascade={"persist", "remove"})
     */
    private $uncompte;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="licencies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unClub;

    /**
     * @ORM\ManyToOne(targetEntity=Qualite::class, inversedBy="deslicencies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unequalite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumlicenceunique(): ?int
    {
        return $this->numlicenceunique;
    }

    public function setNumlicenceunique(int $numlicenceunique): self
    {
        $this->numlicenceunique = $numlicenceunique;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getUncompte(): ?Compte
    {
        return $this->uncompte;
    }

    public function setUncompte(?Compte $uncompte): self
    {
        $this->uncompte = $uncompte;

        return $this;
    }

    public function getUnClub(): ?Club
    {
        return $this->unClub;
    }

    public function setUnClub(?Club $unClub): self
    {
        $this->unClub = $unClub;

        return $this;
    }

    public function getUnequalite(): ?Qualite
    {
        return $this->unequalite;
    }

    public function setUnequalite(?Qualite $unequalite): self
    {
        $this->unequalite = $unequalite;

        return $this;
    }
}
