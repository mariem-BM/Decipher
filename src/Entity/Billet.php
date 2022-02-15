<?php

namespace App\Entity;

use App\Repository\BilletRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BilletRepository::class)
 */
class Billet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $chair_billet;

    /**
     * @ORM\Column(type="integer")
     */
    private $voyage_num;


    /**
     * @ORM\Column(type="integer")
     */
    private $terminal;

    /**
     * @ORM\Column(type="integer")
     */
    private $portail;

    /**
     * @ORM\Column(type="date")
     */
    private $embarquement;



    /**
     * @ORM\ManyToOne(targetEntity=Localisation::class, inversedBy="billet")
     */
    private $localisation;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="billet")
     */
    private $reservation;

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChairBillet(): ?int
    {
        return $this->chair_billet;
    }

    public function setChairBillet(int $chair_billet): self
    {
        $this->chair_billet = $chair_billet;

        return $this;
    }

    public function getVoyageNum(): ?int
    {
        return $this->voyage_num;
    }

    public function setVoyageNum(int $voyage_num): self
    {
        $this->voyage_num = $voyage_num;

        return $this;
    }


    public function getTerminal(): ?int
    {
        return $this->terminal;
    }

    public function setTerminal(int $terminal): self
    {
        $this->terminal = $terminal;

        return $this;
    }

    public function getPortail(): ?int
    {
        return $this->portail;
    }

    public function setPortail(int $portail): self
    {
        $this->portail = $portail;

        return $this;
    }

    public function getEmbarquement(): ?\DateTimeInterface
    {
        return $this->embarquement;
    }

    public function setEmbarquement(\DateTimeInterface $embarquement): self
    {
        $this->embarquement = $embarquement;

        return $this;
    }



    public function getLocalisation(): ?Localisation
    {
        return $this->localisation;
    }

    public function setLocalisation(?Localisation $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setBillet($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getBillet() === $this) {
                $reservation->setBillet(null);
            }
        }

        return $this;
    }


}
