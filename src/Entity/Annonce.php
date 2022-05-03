<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Title;

    #[ORM\Column(type: 'string', length: 255)]
    private $Description;

    #[ORM\Column(type: 'string', length: 255)]
    private $Price;

    #[ORM\Column(type: 'datetime')]
    private $CreatedAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $City;

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: Photo::class)]
    private $Imgs;

    #[ORM\OneToOne(targetEntity: Vehicule::class, cascade: ['persist', 'remove'])]
    private $IdVehicule;

    public function __construct()
    {
        $this->Imgs = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getImgs(): Collection
    {
        return $this->Imgs;
    }

    public function addImg(Photo $img): self
    {
        if (!$this->Imgs->contains($img)) {
            $this->Imgs[] = $img;
            $img->setAnnonce($this);
        }

        return $this;
    }

    public function removeImg(Photo $img): self
    {
        if ($this->Imgs->removeElement($img)) {
            // set the owning side to null (unless already changed)
            if ($img->getAnnonce() === $this) {
                $img->setAnnonce(null);
            }
        }

        return $this;
    }

    public function getIdVehicule(): ?Vehicule
    {
        return $this->IdVehicule;
    }

    public function setIdVehicule(?Vehicule $IdVehicule): self
    {
        $this->IdVehicule = $IdVehicule;

        return $this;
    }
}
