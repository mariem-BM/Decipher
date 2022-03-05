<?php

namespace App\Entity;

use App\Repository\LocalisationRepository;
use App\Repository\PlaninngRepository;

use App\Entity\Planinng;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=LocalisationRepository::class)
 */
class Localisation
{
    
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



   
    /**
     * @ORM\Column(type="time")
     */
    private $heureDepart_localisation;

    /**
     * @ORM\Column(type="time")
     */
    private $heureArrivee_loacalisation;

    public function __toString()
    {
        return $this->positionDepart_localisation;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $positionDepart_localisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $positionArivee_planning;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fusee;

    /**
     * @ORM\OneToMany(targetEntity=Billet::class, mappedBy="localisation")
     */
    private $billet;

 
    
    

    public function __construct()
    {
        $this->billet = new ArrayCollection();
        $this->planning = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDepartLocalisation(): ?\DateTimeInterface
    {
        return $this->heureDepart_localisation;
    }

    public function setHeureDepartLocalisation(\DateTimeInterface $heureDepart_localisation): self
    {
        $this->heureDepart_localisation = $heureDepart_localisation;

        return $this;
    }

    public function getHeureArriveeLoacalisation(): ?\DateTimeInterface
    {
        return $this->heureArrivee_loacalisation;
    }

    public function setHeureArriveeLoacalisation(\DateTimeInterface $heureArrivee_loacalisation): self
    {
        $this->heureArrivee_loacalisation = $heureArrivee_loacalisation;

        return $this;
    }

    public function getPositionDepartLocalisation(): ?string
    {
        return $this->positionDepart_localisation;
    }

    public function setPositionDepartLocalisation(string $positionDepart_localisation): self
    {
        $this->positionDepart_localisation = $positionDepart_localisation;

        return $this;
    }

    public function getPositionAriveePlanning(): ?string
    {
        return $this->positionArivee_planning;
    }

    public function setPositionAriveePlanning(string $positionArivee_planning): self
    {
        $this->positionArivee_planning = $positionArivee_planning;

        return $this;
    }

    public function getFusee(): ?string
    {
        return $this->fusee;
    }

    public function setFusee(string $fusee): self
    {
        $this->fusee = $fusee;

        return $this;
    }

   
    /**
     * @return Collection|Billet[]
     */
    public function getBillet(): Collection
    {
        return $this->billet;
    }

    public function addBillet(Billet $billet): self
    {
        if (!$this->billet->contains($billet)) {
            $this->billet[] = $billet;
            $billet->setLocalisation($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->billet->removeElement($billet)) {
            // set the owning side to null (unless already changed)
            if ($billet->getLocalisation() === $this) {
                $billet->setLocalisation(null);
            }
        }

        return $this;
    }

     /**
     * @return Collection|Planinng[]
     */
    public function getPlanning(): Collection
    {
        return $this->planning;
    }
    public function addPlanning(Planinng $planning): self
    {
        if (!$this->planning->contains($planning)) {
            $this->planning[] = $planning;
            $planning->setNomPlanning($this);
        }

        return $this;
    }

    public function removePlanning(Planinng $planning)
    {
        if ($this->planning->removeElement($planning)) {
            // set the owning side to null (unless already changed)
            if ($planning->getNomPlanning() === $this) {
                $planning->setNomPlanning($this);
            }
        }
   
    }

    
   
}
