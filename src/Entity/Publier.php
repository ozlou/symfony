<?php

namespace App\Entity;

use App\Repository\PublierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublierRepository::class)]
class Publier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(inversedBy: 'IdPublier', targetEntity: Annonce::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $IdAnnonce;

    #[ORM\OneToOne(inversedBy: 'IdPublier', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $IdUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAnnonce(): ?Annonce
    {
        return $this->IdAnnonce;
    }

    public function setIdAnnonce(Annonce $IdAnnonce): self
    {
        $this->IdAnnonce = $IdAnnonce;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->IdUser;
    }

    public function setIdUser(?User $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }
}
