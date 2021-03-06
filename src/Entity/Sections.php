<?php

namespace App\Entity;

use App\Repository\SectionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionsRepository::class)
 */
class Sections
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=2, max=20,minMessage = "Votre message a moins que {{ limit }} caractères", maxMessage = "Votre message a plus que {{ limit }} caractères")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Compagnies::class, inversedBy="sections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compagnie;

    /**
     * @ORM\OneToMany(targetEntity=Filieres::class, mappedBy="section", cascade={"remove"})
     */
    private $filieres;

    /**
     * @ORM\OneToMany(targetEntity=Users::class, mappedBy="section",orphanRemoval=true)
     */
    private $users;

    public function __construct()
    {
        $this->filieres = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getCompagnie(): ?Compagnies
    {
        return $this->compagnie;
    }

    public function setCompagnie(?Compagnies $compagnie): self
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    /**
     * @return Collection|Filieres[]
     */
    public function getFilieres(): Collection
    {
        return $this->filieres;
    }

    public function addFiliere(Filieres $filiere): self
    {
        if (!$this->filieres->contains($filiere)) {
            $this->filieres[] = $filiere;
            $filiere->setSection($this);
        }

        return $this;
    }

    public function removeFiliere(Filieres $filiere): self
    {
        if ($this->filieres->removeElement($filiere)) {
            // set the owning side to null (unless already changed)
            if ($filiere->getSection() === $this) {
                $filiere->setSection(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setSection($this);
        }

        return $this;
    }
 
}
