<?php

namespace App\Entity;

use App\Repository\CourpublicsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Matierepublics::class, inversedBy="courpublics")
     */
    private $matierepublic;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;

    /**
     * @ORM\OneToMany(targetEntity=CoursFilesp::class, mappedBy="courfilesp", orphanRemoval=true, cascade={"persist"})
     */
    private $coursFilesps;

    public function __construct()
    {
        $this->coursFilesps = new ArrayCollection();
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

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * @return Collection|CoursFilesp[]
     */
    public function getCoursFilesps(): Collection
    {
        return $this->coursFilesps;
    }

    public function addCoursFilesp(CoursFilesp $coursFilesp): self
    {
        if (!$this->coursFilesps->contains($coursFilesp)) {
            $this->coursFilesps[] = $coursFilesp;
            $coursFilesp->setCourfilesp($this);
        }

        return $this;
    }

    public function removeCoursFilesp(CoursFilesp $coursFilesp): self
    {
        if ($this->coursFilesps->removeElement($coursFilesp)) {
            // set the owning side to null (unless already changed)
            if ($coursFilesp->getCourfilesp() === $this) {
                $coursFilesp->setCourfilesp(null);
            }
        }

        return $this;
    }
}
