<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Idimg;

    #[ORM\Column(type: 'string', length: 255)]
    private $Path;

    #[ORM\ManyToOne(targetEntity: Annonce::class, inversedBy: 'Photos')]
    private $IdAnnonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdimg(): ?string
    {
        return $this->Idimg;
    }

    public function setIdimg(string $Idimg): self
    {
        $this->Idimg = $Idimg;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->Path;
    }

    public function setPath(string $Path): self
    {
        $this->Path = $Path;

        return $this;
    }

    public function getIdAnnonce(): ?Annonce
    {
        return $this->IdAnnonce;
    }

    public function setIdAnnonce(?Annonce $IdAnnonce): self
    {
        $this->IdAnnonce = $IdAnnonce;

        return $this;
    }
}
