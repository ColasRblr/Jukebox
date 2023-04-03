<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonId(): ?Person
    {
        return $this->person_id;
    }

    public function setPersonId(Person $person_id): self
    {
        $this->person_id = $person_id;

        return $this;
    }
}
