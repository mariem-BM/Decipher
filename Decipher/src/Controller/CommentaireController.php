<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="commentaire")
     */
    public function index(): Response
    {
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }
     /**
     * @Route("/AfficheCommentaire", name=" afficheCommentaire")
     */
    public function AfficheCategorie(): Response
    {
        return $this->render('commentaire/Commentaire.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }
}
