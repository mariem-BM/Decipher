<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    public function __toString()
    {
        return $this->msg_commentaire;
    }

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Do not leave empty")
     */
    private $date_commentaire;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Do not leave empty")
     */
    private $msg_commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="Commentaire")
     */
    private $post;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->date_commentaire;
    }

    public function setDateCommentaire(\DateTimeInterface $date_commentaire): self
    {
        $this->date_commentaire = $date_commentaire;

        return $this;
    }

    public function getMsgCommentaire(): ?string
    {
        return $this->msg_commentaire;
    }

    public function setMsgCommentaire(string $msg_commentaire): self
    {
        $this->msg_commentaire = $msg_commentaire;

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
}
