<?php

namespace App\Entity;

use App\Repository\CategorieChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieChambreRepository::class)
 */
class CategorieChambre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}