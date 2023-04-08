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
     public function getFirstname()
     {
         if (isset($this->person)) {
            return $this->person->getFirstname();        }
         return null;
     }
     public function getLastname()
     {
         if (isset($this->person)) {
             return $this->person->getLastname();
         }
         return null;
     }

     public function getEmail()
     {
        if (isset($this->person)) {
             return $this->person->getEmail();
         }
         return null;
     }
     public function getPassword()
    {
         if (isset($this->person)) {
             return $this->person->getFirstname();         }
         return null;
    }
 }



