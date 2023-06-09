<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]

class User

// // extends Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\Column]
    private ?bool $isUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonId(): ?Person
    {
        return $this->person;
    }

    public function setPersonId(Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function isIsUser(): ?bool
    {
        return $this->isUser;
    }

    public function setIsUser(bool $isUser): self
    {
        $this->isUser = $isUser;

        return $this;
    }
}
