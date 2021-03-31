<?php

namespace App\Entity;

use App\Repository\VacationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacationsRepository::class)
 */
class Vacations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateheuredebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateheurefin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateheuredebut(): ?\DateTimeInterface
    {
        return $this->dateheuredebut;
    }

    public function setDateheuredebut(\DateTimeInterface $dateheuredebut): self
    {
        $this->dateheuredebut = $dateheuredebut;

        return $this;
    }

    public function getDateheurefin(): ?\DateTimeInterface
    {
        return $this->dateheurefin;
    }

    public function setDateheurefin(\DateTimeInterface $dateheurefin): self
    {
        $this->dateheurefin = $dateheurefin;

        return $this;
    }
}
