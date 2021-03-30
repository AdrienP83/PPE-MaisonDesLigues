<?php

namespace App\Entity;

use App\Repository\NuiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NuiteRepository::class)
 */
class Nuite
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
    private $datenuit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatenuit(): ?\DateTimeInterface
    {
        return $this->datenuit;
    }

    public function setDatenuit(\DateTimeInterface $datenuit): self
    {
        $this->datenuit = $datenuit;

        return $this;
    }
}
