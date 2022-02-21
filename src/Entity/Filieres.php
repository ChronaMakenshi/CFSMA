<?php

namespace App\Entity;

use App\Repository\FilieresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilieresRepository::class)
 */
class Filieres
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $section_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSectionId(): ?int
    {
        return $this->section_id;
    }

    public function setSectionId(int $section_id): self
    {
        $this->section_id = $section_id;

        return $this;
    }
}
