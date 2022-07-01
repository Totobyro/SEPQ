<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity=Saison::class, inversedBy="joueurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saisons;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class, inversedBy="joueurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $posteId;

    /**
     * @ORM\OneToMany(targetEntity=Statistique::class, mappedBy="joueur")
     */
    private $statId;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->statId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Saison>
     */
    public function getSaisons(): Collection
    {
        return $this->saisons;
    }

    public function addSaison(Saison $saison): self
    {
        if (!$this->saisons->contains($saison)) {
            $this->saisons[] = $saison;
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        $this->saisons->removeElement($saison);

        return $this;
    }

    public function getPosteId(): ?Poste
    {
        return $this->posteId;
    }

    public function setPosteId(?Poste $posteId): self
    {
        $this->posteId = $posteId;

        return $this;
    }

    /**
     * @return Collection<int, Statistique>
     */
    public function getStatId(): Collection
    {
        return $this->statId;
    }

    public function addStatId(Statistique $statId): self
    {
        if (!$this->statId->contains($statId)) {
            $this->statId[] = $statId;
            $statId->setJoueur($this);
        }

        return $this;
    }

    public function removeStatId(Statistique $statId): self
    {
        if ($this->statId->removeElement($statId)) {
            // set the owning side to null (unless already changed)
            if ($statId->getJoueur() === $this) {
                $statId->setJoueur(null);
            }
        }

        return $this;
    }
}
