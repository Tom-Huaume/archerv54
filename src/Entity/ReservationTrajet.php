<?php

namespace App\Entity;

use App\Repository\ReservationTrajetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationTrajetRepository::class)
 */
class ReservationTrajet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureReservation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidation(): ?bool
    {
        return $this->validation;
    }

    public function setValidation(bool $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getDateHeureReservation(): ?\DateTimeInterface
    {
        return $this->dateHeureReservation;
    }

    public function setDateHeureReservation(\DateTimeInterface $dateHeureReservation): self
    {
        $this->dateHeureReservation = $dateHeureReservation;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
