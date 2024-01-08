<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CandidatureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
#[ApiResource]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne()]
    #[ORM\JoinColumn(nullable: false,onDelete:'CASCADE')]
    private ?User $user = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false,onDelete:'CASCADE')]
    private ?Formation $formation = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $statut = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;

        return $this;
    }
    public function getStatut(): array
    {
        $statut = $this->statut;
        $statut[] = 'Attente';
        // return $this->statut;
        return array_unique($statut);
    }

    public function setStatut(array $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
}
