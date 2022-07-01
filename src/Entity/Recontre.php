<?php

namespace App\Entity;

use App\Repository\RecontreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecontreRepository::class)
 */
class Recontre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rencontreWeekEnd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRencontreWeekEnd(): ?string
    {
        return $this->rencontreWeekEnd;
    }

    public function setRencontreWeekEnd(string $rencontreWeekEnd): self
    {
        $this->rencontreWeekEnd = $rencontreWeekEnd;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
