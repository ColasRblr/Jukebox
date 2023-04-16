<?php
namespace App\Entity;


use App\Entity\Person;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping as ORM;


class User extends Person
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private ?int $id = null;

    #[OneToOne(cascade: ['persist', 'remove'])]
    #[JoinColumn(nullable: false)]
    private ?Person $person = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getFirstname(): ?string
    {
        if (isset($this->person)) {
            return $this->person->getFirstname();
        }
        return null;
    }

    public function setFirstname(string $firstname): self
    {
        if (isset($this->person)) {
            $this->person->setFirstname($firstname);
        }

        return $this;
    }

    public function getLastname(): ?string
    {
        if (isset($this->person)) {
            return $this->person->getLastname();
        }
        return null;
    }

    public function setLastname(string $lastname): self
    {
        if (isset($this->person)) {
            $this->person->setLastname($lastname);
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        if (isset($this->person)) {
            return $this->person->getEmail();
        }
        return null;
    }

    public function setEmail(string $email): self
    {
        if (isset($this->person)) {
            $this->person->setEmail($email);
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        if (isset($this->person)) {
            return $this->person->getPassword();
        }
        return null;
    }

    public function setPassword(string $password): self
    {
        if (isset($this->person)) {
            $this->person->setPassword($password);
        }

        return $this;
    }
}
