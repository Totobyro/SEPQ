<?php

namespace App\Entity;

use App\Repository\StatistiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatistiqueRepository::class)
 */
class Statistique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbButChamp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbButCoupe;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbPasseChamp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbPasseCoupe;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbCartonJaune;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="statId")
     */
    private $joueur;

    /**
     * @ORM\ManyToOne(targetEntity=Saison::class, inversedBy="statistiques")
     */
    private $saisonId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbButChamp(): ?int
    {
        return $this->nbButChamp;
    }

    public function setNbButChamp(int $nbButChamp): self
    {
        $this->nbButChamp = $nbButChamp;

        return $this;
    }

    public function getNbButCoupe(): ?int
    {
        return $this->nbButCoupe;
    }

    public function setNbButCoupe(int $nbButCoupe): self
    {
        $this->nbButCoupe = $nbButCoupe;

        return $this;
    }

    public function getNbPasseChamp(): ?int
    {
        return $this->nbPasseChamp;
    }

    public function setNbPasseChamp(int $nbPasseChamp): self
    {
        $this->nbPasseChamp = $nbPasseChamp;

        return $this;
    }

    public function getNbPasseCoupe(): ?int
    {
        return $this->nbPasseCoupe;
    }

    public function setNbPasseCoupe(int $nbPasseCoupe): self
    {
        $this->nbPasseCoupe = $nbPasseCoupe;

        return $this;
    }

    public function getNbCartonJaune(): ?int
    {
        return $this->nbCartonJaune;
    }

    public function setNbCartonJaune(int $nbCartonJaune): self
    {
        $this->nbCartonJaune = $nbCartonJaune;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getSaisonId(): ?Saison
    {
        return $this->saisonId;
    }

    public function setSaisonId(?Saison $saisonId): self
    {
        $this->saisonId = $saisonId;

        return $this;
    }
}
