<?php

namespace App\Entity;

use App\Repository\ResevationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResevationRepository::class)
 */
class Resevation
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $reservationNumber;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateRervation;

     /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity=Annonce::class, inversedBy="resevation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonces;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getReservationNumber(): ?int
    {
        return $this->reservationNumber;
    }

    public function setReservationNumber(int $reservationNumber): self
    {
        $this->reservationNumber = $reservationNumber;

        return $this;
    }

    public function getDateRervation(): ?\DateTimeInterface
    {
        return $this->dateRervation;
    }

    public function setDateRervation(\DateTimeInterface $dateRervation): self
    {
        $this->dateRervation = $dateRervation;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getAnnonces(): ?Annonce
    {
        return $this->annonces;
    }

    public function setAnnonces(Annonce $annonces): self
    {
        $this->annonces = $annonces;

        return $this;
    }
}
