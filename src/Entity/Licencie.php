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
}
