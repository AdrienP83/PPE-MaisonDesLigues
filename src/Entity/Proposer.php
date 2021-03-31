<?php

namespace App\Entity;

use App\Repository\ProposerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProposerRepository::class)
 */
class Proposer
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
    private $tarifnuite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifnuite(): ?int
    {
        return $this->tarifnuite;
    }

    public function setTarifnuite(int $tarifnuite): self
    {
        $this->tarifnuite = $tarifnuite;

        return $this;
    }
}
