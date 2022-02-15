<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="id is required") 
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="nom is required") 
     */
    private $nom_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="prenom is required") 
     */
    private $prenom_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\NotBlank(message="Email is required") 
     * @Assert\Email(message = "The email '{{ value }}' is not a valid  email.") 
     */
    private $mail_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sudo_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Etat_Compte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Numero_utilisateur;

    /**
     * @ORM\Column(type="date")
     */
    private $DateN_utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="User")
     */
    private $post;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="user")
     */
    private $Reclamation;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="user")
     */
    private $reservations;

    public function __construct()
    {
        $this->Reclamation = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): self
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): self
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getAdresseUtilisateur(): ?string
    {
        return $this->adresse_utilisateur;
    }

    public function setAdresseUtilisateur(string $adresse_utilisateur): self
    {
        $this->adresse_utilisateur = $adresse_utilisateur;

        return $this;
    }

    public function getMailUtilisateur(): ?string
    {
        return $this->mail_utilisateur;
    }

    public function setMailUtilisateur(string $mail_utilisateur): self
    {
        $this->mail_utilisateur = $mail_utilisateur;

        return $this;
    }

    public function getSudoUtilisateur(): ?string
    {
        return $this->sudo_utilisateur;
    }

    public function setSudoUtilisateur(string $sudo_utilisateur): self
    {
        $this->sudo_utilisateur = $sudo_utilisateur;

        return $this;
    }

    public function getMdpUtilisateur(): ?string
    {
        return $this->mdp_utilisateur;
    }

    public function setMdpUtilisateur(string $mdp_utilisateur): self
    {
        $this->mdp_utilisateur = $mdp_utilisateur;

        return $this;
    }

    public function getEtatCompte(): ?string
    {
        return $this->Etat_Compte;
    }

    public function setEtatCompte(string $Etat_Compte): self
    {
        $this->Etat_Compte = $Etat_Compte;

        return $this;
    }

    public function getNumeroUtilisateur(): ?string
    {
        return $this->Numero_utilisateur;
    }

    public function setNumeroUtilisateur(string $Numero_utilisateur): self
    {
        $this->Numero_utilisateur = $Numero_utilisateur;

        return $this;
    }

    public function getDateNUtilisateur(): ?\DateTimeInterface
    {
        return $this->DateN_utilisateur;
    }

    public function setDateNUtilisateur(\DateTimeInterface $DateN_utilisateur): self
    {
        $this->DateN_utilisateur = $DateN_utilisateur;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    /**
     * @return Collection|Reclamation[]
     */
    public function getReclamation(): Collection
    {
        return $this->Reclamation;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->Reclamation->contains($reclamation)) {
            $this->Reclamation[] = $reclamation;
            $reclamation->setUser($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->Reclamation->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getUser() === $this) {
                $reclamation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setUser($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUser() === $this) {
                $reservation->setUser(null);
            }
        }

        return $this;
    }
}
