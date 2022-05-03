<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $marque;

    #[ORM\Column(type: 'string', length: 255)]
    private $model;

    #[ORM\Column(type: 'integer')]
    private $Year;

    #[ORM\Column(type: 'integer')]
    private $Km;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Carburant;

    #[ORM\Column(type: 'integer')]
    private $Puissance;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(int $Year): self
    {
        $this->Year = $Year;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->Km;
    }

    public function setKm(int $Km): self
    {
        $this->Km = $Km;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->Carburant;
    }

    public function setCarburant(?string $Carburant): self
    {
        $this->Carburant = $Carburant;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->Puissance;
    }

    public function setPuissance(int $Puissance): self
    {
        $this->Puissance = $Puissance;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
