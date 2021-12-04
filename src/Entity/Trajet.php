<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrajetRepository::class)
 */
class Trajet
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDepart;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlaces;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $typeVoiture;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $couleurVoiture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureCreation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateHeureDepart(): ?\DateTimeInterface
    {
        return $this->dateHeureDepart;
    }

    public function setDateHeureDepart(\DateTimeInterface $dateHeureDepart): self
    {
        $this->dateHeureDepart = $dateHeureDepart;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getTypeVoiture(): ?string
    {
        return $this->typeVoiture;
    }

    public function setTypeVoiture(?string $typeVoiture): self
    {
        $this->typeVoiture = $typeVoiture;

        return $this;
    }

    public function getCouleurVoiture(): ?string
    {
        return $this->couleurVoiture;
    }

    public function setCouleurVoiture(?string $couleurVoiture): self
    {
        $this->couleurVoiture = $couleurVoiture;

        return $this;
    }

    public function getDateHeureCreation(): ?\DateTimeInterface
    {
        return $this->dateHeureCreation;
    }

    public function setDateHeureCreation(\DateTimeInterface $dateHeureCreation): self
    {
        $this->dateHeureCreation = $dateHeureCreation;

        return $this;
    }
}
