<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\EquipementType;
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
     * @param EquipementRepository $repository
     * @return /Symfony/Component/HttpFondation/Response;
     * @Route("/AfficheEquipement",name="AfficheEquipement")
     */
    public function Affiche(EquipementRepository $repository)
    {
        $user=$repository->findAll();
        return $this->render('equipement/AfficheEquipement.html.twig',['user'=>$user]);
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
     /**
     * @Route("/User/Update/{id}", name="Update")
     */
    function Update(UserRepository $repository,$id,Request $request){
        $user=$repository->find($id);
        $form=$this->createForm(UserType::class,$user);
        $form->add('Update',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid())
{
    $em=$this->getDoctrine()->getManager();
    $em->flush();
    return $this->redirectToRoute("AfficheUser");

}
return $this->render('user/Update.html.twig',[
    'f'=>$form->createView()
]);
    }
}
