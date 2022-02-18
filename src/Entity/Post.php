<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    public function __toString()
    {
        return $this->nom_post;
    }

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="le champ est vide")
     */
    private $nom_post;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="s'il vous plaît télécharger l'image")
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 400,
     *     minHeight = 200,
     *     maxHeight = 400
     * )
     */
    private $img_post;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="le champ est vide")
     */
    private $description_post;

    /**
     * @ORM\ManyToOne(targetEntity=CategoriePost::class, inversedBy="Post")
     */
    private $categoriePost;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="post")
     */
    private $Commentaire;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="post")
     */
    private $User;

    public function __construct()
    {
        $this->Commentaire = new ArrayCollection();
        $this->User = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPost(): ?string
    {
        return $this->nom_post;
    }

    public function setNomPost(string $nom_post): self
    {
        $this->nom_post = $nom_post;

        return $this;
    }

    public function getImgPost()
    {
        return $this->img_post;
    }

    public function setImgPost( $img_post)
    {
        $this->img_post = $img_post;

        return $this;
    }
    

    public function getDescriptionPost(): ?string
    {
        return $this->description_post;
    }

    public function setDescriptionPost(string $description_post): self
    {
        $this->description_post = $description_post;

        return $this;
    }

    public function getCategoriePost(): ?CategoriePost
    {
        return $this->categoriePost;
    }

    public function setCategoriePost(?CategoriePost $categoriePost): self
    {
        $this->categoriePost = $categoriePost;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->Commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->Commentaire->contains($commentaire)) {
            $this->Commentaire[] = $commentaire;
            $commentaire->setPost($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPost() === $this) {
                $commentaire->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
            $user->setPost($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getPost() === $this) {
                $user->setPost(null);
            }
        }

        return $this;
    }
}
