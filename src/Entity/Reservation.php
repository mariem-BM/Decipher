<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Do not leave empty")
     */
    private $date_reservation;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Do not leave empty"),
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Positive
     */
    private $nbrebillet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Do not leave empty"),
     * @Assert\Length(
     * min = 5,
     * max = 7,
     * minMessage = "L' etat de reservation doit comporter au moins {{ limit }} caractères",
     * maxMessage = "L' etat de reservation doit comporter au plus {{ limit }} caractères"
     * )
     */
    
    private $etat_reservation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Billet::class, inversedBy="reservation")
     */
    private $billet;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getNbrebillet(): ?int
    {
        return $this->nbrebillet;
    }

    public function setNbrebillet(int $nbrebillet): self
    {
        $this->nbrebillet = $nbrebillet;

        return $this;
    }

    public function getEtatReservation(): ?string
    {
        return $this->etat_reservation;
    }

    public function setEtatReservation(string $etat_reservation): self
    {
        $this->etat_reservation = $etat_reservation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBillet(): ?Billet
    {
        return $this->billet;
    }

    public function setBillet(?Billet $billet): self
    {
        $this->billet = $billet;

        return $this;
    }


}
