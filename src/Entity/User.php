<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class User extends Person

{


    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    // public function setId(int $id): self
    // {
    //     $this->id = $id;

    //     return $this;
    // }

    // public function getPerson(): ?Person
    // {
    //     return $this->person;
    // }

    // public function setPerson(Person $person): self
    // {
    //     $this->person = $person;

    //     return $this;
    // }

    //     public function getFirstname(): ?string
    //     {
    //         if (isset($this->person)) {
    //             return $this->person->getFirstname();
    //         }
    //         return null;
    //     }

    //     public function setFirstname(string $firstname): self
    //     {
    //         if (isset($this->person)) {
    //             $this->person->setFirstname($firstname);
    //         }

    //         return $this;
    //     }

    //     public function getLastname(): ?string
    //     {
    //         if (isset($this->person)) {
    //             return $this->person->getLastname();
    //         }
    //         return null;
    //     }

    //     public function setLastname(string $lastname): self
    //     {
    //         if (isset($this->person)) {
    //             $this->person->setLastname($lastname);
    //         }

    //         return $this;
    //     }

    //     public function getEmail(): ?string
    //     {
    //         if (isset($this->person)) {
    //             return $this->person->getEmail();
    //         }
    //         return null;
    //     }

    //     public function setEmail(string $email): self
    //     {
    //         if (isset($this->person)) {
    //             $this->person->setEmail($email);
    //         }

    //         return $this;
    //     }

    //     public function getPassword(): ?string
    //     {
    //         if (isset($this->person)) {
    //             return $this->person->getPassword();
    //         }
    //         return null;
    //     }

    //     public function setPassword(string $password): self
    //     {
    //         if (isset($this->person)) {
    //             $this->person->setPassword($password);
    //         }

    //         return $this;
    //     }
    // }

}
