<?php

namespace App\Entity;

use App\Repository\CategorieEquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieEquipementRepository::class)
 */
class CategorieEquipement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Choice(
     *      choices = {"metaliques", "plastiques","nourriture","vestimentaires"},
     *     message = "Choose a valid category( metaliques,plastiques,nourriture, vestimentaires)."
     * )
     */
    private $nom_categorie_equipement;

    /**
     * @ORM\OneToMany(targetEntity=Equipement::class, mappedBy="categorieEquipement")
     */
    private $Equipement;

    public function __construct()
    {
        $this->Equipement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorieEquipement(): ?string
    {
        return $this->nom_categorie_equipement;
    }

    public function setNomCategorieEquipement(string $nom_categorie_equipement): self
    {
        $this->nom_categorie_equipement = $nom_categorie_equipement;

        return $this;
    }

    /**
     * @return Collection|Equipement[]
     */
    public function getEquipement(): Collection
    {
        return $this->Equipement;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->Equipement->contains($equipement)) {
            $this->Equipement[] = $equipement;
            $equipement->setCategorieEquipement($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        if ($this->Equipement->removeElement($equipement)) {
            // set the owning side to null (unless already changed)
            if ($equipement->getCategorieEquipement() === $this) {
                $equipement->setCategorieEquipement(null);
            }
        }

        return $this;
    }
    public function __toString() 
{
    return (string) $this->nom_categorie_equipement; 
}
}
