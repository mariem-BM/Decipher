<?php

namespace App\Entity;

use App\Repository\LocalisationRepository;
use App\Repository\PlaninngRepository;

use App\Entity\Planinng;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity(repositoryClass=LocalisationRepository::class)
 */
class Localisation
{
    
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("Localisation:read")
     */
    private $id;



   
    /**
     * @ORM\Column(type="time")
     * @Groups("Localisation:read")
     */
    private $heureDepart_localisation;

    /**
     * @ORM\Column(type="time")
     * @Groups("Localisation:read")
     */
    private $heureArrivee_loacalisation;

    public function __toString()
    {
        return $this->positionDepart_localisation;
    }

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Localisation:read")
     */
    private $positionDepart_localisation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Localisation:read")
     */
    private $positionArivee_planning;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Localisation:read")
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
    public function getPlaninng(): Collection
    {
        return $this->nom_planinng;
    }

    public function addPlaninng(Planinng $planinng): self
    {
        if (!$this->planinng->contains($nom_planinng)) {
        
            $this->planinng[] = $nom_planinng;
            $planinng->setPlaninng($this);
        }

        return $this;
    }
    
    public function removePlaninng(Planinng $planinng): self
    {
        if ($this->planinng->removeElement($planinng)) {
            // set the owning side to null (unless already changed)
            if ($planinng->getPlaninng() === $this) {
                $planinng->setPlaninng(null);
            }
        }

        return $this;
    }



  
    
   
}
