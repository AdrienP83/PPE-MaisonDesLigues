<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $daterepas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typerepas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDaterepas(): ?\DateTimeInterface
    {
        return $this->daterepas;
    }

    public function setDaterepas(\DateTimeInterface $daterepas): self
    {
        $this->daterepas = $daterepas;

        return $this;
    }

    public function getTyperepas(): ?string
    {
        return $this->typerepas;
    }

    public function setTyperepas(string $typerepas): self
    {
        $this->typerepas = $typerepas;

        return $this;
    }
}
