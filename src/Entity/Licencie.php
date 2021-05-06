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
    private $unclub;

    /**
     * @ORM\ManyToOne(targetEntity=Qualite::class, inversedBy="deslicencies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unequalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse2;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="date")
     */
    private $date_adhesion;

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

    public function getUnclub(): ?Club
    {
        return $this->unclub;
    }

    public function setUnclub(?Club $unclub): self
    {
        $this->unclub = $unclub;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(string $adresse1): self
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): self
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDateAdhesion(): ?\DateTimeInterface
    {
        return $this->date_adhesion;
    }

    public function setDateAdhesion(\DateTimeInterface $date_adhesion): self
    {
        $this->date_adhesion = $date_adhesion;

        return $this;
    }
}
