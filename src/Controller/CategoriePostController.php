<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriePostController extends AbstractController
{
    /**
     * @Route("/categorie/post", name="categorie_post")
     */
    public function index(): Response
    {
        return $this->render('categorie_post/index.html.twig', [
            'controller_name' => 'CategoriePostController',
        ]);
    }
     /**
     * @Route("/AfficheCategorie", name=" afficheCategorie")
     */
    public function AfficheCategorie(): Response
    {
        return $this->render('categorie_post/Categorie.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
}
