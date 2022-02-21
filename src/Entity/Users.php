<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Login;

    /**
     * @ORM\Column(type="text")
     */
    private $Passwd;

    /**
     * @ORM\Column(type="integer")
     */
    private $Role_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Section_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Filiere_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Classe_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): self
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPasswd(): ?string
    {
        return $this->Passwd;
    }

    public function setPasswd(string $Passwd): self
    {
        $this->Passwd = $Passwd;

        return $this;
    }

    public function getRoleId(): ?int
    {
        return $this->Role_id;
    }

    public function setRoleId(int $Role_id): self
    {
        $this->Role_id = $Role_id;

        return $this;
    }

    public function getSectionId(): ?int
    {
        return $this->Section_id;
    }

    public function setSectionId(int $Section_id): self
    {
        $this->Section_id = $Section_id;

        return $this;
    }

    public function getFiliereId(): ?int
    {
        return $this->Filiere_id;
    }

    public function setFiliereId(?int $Filiere_id): self
    {
        $this->Filiere_id = $Filiere_id;

        return $this;
    }

    public function getClasseId(): ?int
    {
        return $this->Classe_id;
    }

    public function setClasseId(?int $Classe_id): self
    {
        $this->Classe_id = $Classe_id;

        return $this;
    }
}
