<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     * message = "{{ value }}' n'est pas une adresse mail valide"
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="4", minMessage="Votre mot de passe doit faire minimum 4 caractères")
     */
    private $password;

    /**
     *
     * @Assert\EqualTo(propertyPath="password", message="Vous n'avez pas tapé le même mot de passe")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @ORM\OneToOne(targetEntity=Licencie::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $unlicencie;

    /**
     * @ORM\OneToOne(targetEntity=Inscription::class, cascade={"persist", "remove"})
     */
    private $uneinscription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getUnlicencie(): ?Licencie
    {
        return $this->unlicencie;
    }

    public function setUnlicencie(Licencie $unlicencie): self
    {
        $this->unlicencie = $unlicencie;

        return $this;
    }

    public function getUneinscription(): ?Inscription
    {
        return $this->uneinscription;
    }

    public function setUneinscription(?Inscription $uneinscription): self
    {
        $this->uneinscription = $uneinscription;

        return $this;
    }

    public function eraseCredentials()
    {;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
    }
}
