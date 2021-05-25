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

    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class, inversedBy="despropositions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unhotel;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieChambre::class, inversedBy="desPropositions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unechambre;

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

    public function getUnhotel(): ?Hotel
    {
        return $this->unhotel;
    }

    public function setUnhotel(?Hotel $unhotel): self
    {
        $this->unhotel = $unhotel;

        return $this;
    }

    public function getUnechambre(): ?CategorieChambre
    {
        return $this->unechambre;
    }

    public function setUnechambre(?CategorieChambre $unechambre): self
    {
        $this->unechambre = $unechambre;

        return $this;
    }
}
