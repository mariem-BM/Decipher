<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    /**
     * @param UserRepository $repository
     * @return /Symfony/Component/HttpFondation/Response;
     * @Route("/AfficheUser",name="AfficheUser")
     */
    public function Affiche(UserRepository $repository)
    {
        $user=$repository->findAll();
        return $this->render('user/AfficheUser.html.twig',['user'=>$user]);
    }
    /**
     * @Route("/SupprimerUser/{id}",name="d")
     */
    function Delete($id,UserRepository $repository)
    { $user=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('AfficheUser');


    }
}
