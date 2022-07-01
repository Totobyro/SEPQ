<?php

namespace App\Form\Model;

use App\Entity\Saison;

class Filtre
{

    private $id;

    private $recherche;

    private $saison;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecherche(): ?string
    {
        return $this->recherche;
    }
    public function setRecherche(?string $recherche): self
    {
        $this->recherche = $recherche;

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }
    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        return $this;
    }
}
