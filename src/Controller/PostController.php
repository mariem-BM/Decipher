<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
   /**
     * @param PostRepository $repository
     * @return \symfony\Component\HttpFoundation\Response
     * @Route("/AffichePost", name="affichepost")
     */
    public function Affiche(PostRepository $repository)
    {
        $Articles=$repository->findAll();
        return $this->render('post/Post.html.twig', [
            'Articles' =>$Articles,
        ]);
    }
   
}