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

    #[ORM\Column(type: 'integer')]
    private $IdAnnonce;

    #[ORM\Column(type: 'string', length: 255)]
    private $Title;

    #[ORM\Column(type: 'string', length: 255)]
    private $Description;

    #[ORM\Column(type: 'integer')]
    private $Price;

    #[ORM\Column(type: 'date')]
    private $CreatedAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $City;

    #[ORM\OneToMany(mappedBy: 'IdAnnonce', targetEntity: Photo::class)]
    private $Photos;

    #[ORM\OneToOne(inversedBy: 'IdAnnonce', targetEntity: Vehicule::class, cascade: ['persist', 'remove'])]
    private $IdVehicule;

    #[ORM\OneToOne(mappedBy: 'IdAnnonce', targetEntity: Publier::class, cascade: ['persist', 'remove'])]
    private $IdPublier;


    public function __construct()
    {
        $this->Photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAnnonce(): ?int
    {
        return $this->IdAnnonce;
    }

    public function setIdAnnonce(int $IdAnnonce): self
    {
        $this->IdAnnonce = $IdAnnonce;

        return $this;
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

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
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

    public function getAnnonce(): ?self
    {
        return $this->annonce;
    }

    public function setAnnonce(?self $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->Photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->Photos->contains($photo)) {
            $this->Photos[] = $photo;
            $photo->setIdAnnonce($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->Photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getIdAnnonce() === $this) {
                $photo->setIdAnnonce(null);
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

    public function getIdPublier(): ?Publier
    {
        return $this->IdPublier;
    }

    public function setIdPublier(Publier $IdPublier): self
    {
        // set the owning side of the relation if necessary
        if ($IdPublier->getIdAnnonce() !== $this) {
            $IdPublier->setIdAnnonce($this);
        }

        $this->IdPublier = $IdPublier;

        return $this;
    }  
}
