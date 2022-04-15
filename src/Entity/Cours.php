<?php

namespace App\Entity;

use App\Entity\Classes;
use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */

class Cours
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
     * @ORM\Column(type="boolean")
     */
    private $visible;

    /**
     * @ORM\ManyToOne(targetEntity=Matieres::class, inversedBy="cours")
     */
    private $matiere;

    /**
     * @ORM\ManyToOne(targetEntity=Classes::class, inversedBy="cours")
     */
    private $classe;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=CoursFiles::class, mappedBy="coursfile", orphanRemoval=true, cascade={"persist"})
     */
    private $coursFiles;

    public function __construct()
    {
        $this->coursFiles = new ArrayCollection();
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

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    public function getMatiere(): ?Matieres
    {
        return $this->matiere;
    }

    public function setMatiere(?Matieres $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getClasse(): ?Classes
    {
        return $this->classe;
    }

    public function setClasse(?Classes $classe): self
    {
        $this->classe = $classe;

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

    /**
     * @return Collection|CoursFiles[]
     */
    public function getCoursFiles(): Collection
    {
        return $this->coursFiles;
    }

    public function addCoursFile(CoursFiles $coursFile): self
    {
        if (!$this->coursFiles->contains($coursFile)) {
            $this->coursFiles[] = $coursFile;
            $coursFile->setCoursfile($this);
        }

        return $this;
    }

    public function removeCoursFile(CoursFiles $coursFile): self
    {
        if ($this->coursFiles->removeElement($coursFile)) {
            // set the owning side to null (unless already changed)
            if ($coursFile->getCoursfile() === $this) {
                $coursFile->setCoursfile(null);
            }
        }

        return $this;
    }
}
