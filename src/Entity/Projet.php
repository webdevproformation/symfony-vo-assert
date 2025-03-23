<?php

namespace App\Entity;

use App\Entity\ValueObject\Etudiant;
use App\Repository\ProjetRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity()]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Embedded(class:Etudiant::class)]
    private ?Etudiant $etudiant1 = null;

    #[ORM\Embedded(class:Etudiant::class)]
    private ?Etudiant $etudiant2 = null;

    public function __construct()
    {
        $this->etudiant1 = new Etudiant();
        $this->etudiant2 = new Etudiant();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getEtudiant1(): ?Etudiant
    {
        return $this->etudiant1;
    }

    public function setEtudiant1(Etudiant $etudiant1): static
    {
        $this->etudiant1 = $etudiant1;

        return $this;
    }

    public function getEtudiant2(): ?Etudiant
    {
        return $this->etudiant2;
    }

    public function setEtudiant2(Etudiant $etudiant2): static
    {
        $this->etudiant2 = $etudiant2;

        return $this;
    }
}
