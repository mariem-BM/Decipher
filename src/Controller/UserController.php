<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;


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
    /**
     * @param Request $request
     * @return /Symfony/Component/HttpFondation/Response;
     * @Route("/User/Add")
     */
    function Add(Request $request)
    {
        $user=new User();
        $form=$this->createForm(UserType::class,$user);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid())
{
    $em=$this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();
    return $this->redirectToRoute('AfficheUser');
}
return $this->render('user/Add.html.twig',['form'=>$form->createView()]);
    }
}
