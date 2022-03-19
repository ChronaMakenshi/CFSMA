<?php

namespace App\Entity;

use App\Repository\CourpublicsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourpublicsRepository::class)
 */
class Courpublics
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
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Matierepublics::class, inversedBy="courpublics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matierepublic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PDF;

    /**
     * @ORM\Column(type="integer")
     */
    private $visible;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMatierepublic(): ?Matierepublics
    {
        return $this->matierepublic;
    }

    public function setMatierepublic(?Matierepublics $matierepublic): self
    {
        $this->matierepublic = $matierepublic;

        return $this;
    }

    public function getPDF(): ?string
    {
        return $this->PDF;
    }

    public function setPDF(string $PDF): self
    {
        $this->PDF = $PDF;

        return $this;
    }

    public function getVisible(): ?int
    {
        return $this->visible;
    }

    public function setVisible(int $visible): self
    {
        $this->visible = $visible;

        return $this;
    }
}
