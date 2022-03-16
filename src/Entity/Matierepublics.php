<?php

namespace App\Entity;

use App\Repository\MatierepublicsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatierepublicsRepository::class)
 */
class Matierepublics
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
     * @ORM\OneToMany(targetEntity=Courpublics::class, mappedBy="matierepublic", orphanRemoval=true)
     */
    private $courpublics;

    public function __construct()
    {
        $this->courpublics = new ArrayCollection();
    }

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

    /**
     * @return Collection|Courpublics[]
     */
    public function getCourpublics(): Collection
    {
        return $this->courpublics;
    }

    public function addCourpublic(Courpublics $courpublic): self
    {
        if (!$this->courpublics->contains($courpublic)) {
            $this->courpublics[] = $courpublic;
            $courpublic->setMatierepublic($this);
        }

        return $this;
    }

    public function removeCourpublic(Courpublics $courpublic): self
    {
        if ($this->courpublics->removeElement($courpublic)) {
            // set the owning side to null (unless already changed)
            if ($courpublic->getMatierepublic() === $this) {
                $courpublic->setMatierepublic(null);
            }
        }

        return $this;
    }
}
