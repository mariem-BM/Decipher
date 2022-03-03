<?php

namespace App\Controller;

use App\Entity\Equipement;
use App\Entity\User;
use App\Form\EquipementType;
use App\Repository\EquipementRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;


/**
 * @Route("/equipementt")
 */
class EquipementController extends AbstractController
{
    /**
     * @Route("/affiche", name="equipement_index", methods={"GET"})
     */
    public function index(EquipementRepository $equipementRepository): Response
    {
        return $this->render('equipement/index.html.twig', [
            'equipements' => $equipementRepository->findAll(),
        ]);
    }
    /**
     * param EquipementRepository $Repository
     * return use Symfony\Component\HttpFoundation\Response;
     * @Route("/display")
     */
    public function indexback(EquipementRepository $Repository)
    {
        $equipement=$Repository->findAll ();
        return $this->render('equipement/indexback.html.twig', [
            'equipements' => $equipement,
        ]);
    }
   

    /**
     * @Route("/new", name="equipement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipement = new Equipement();
        $form = $this->createForm(EquipementType::class, $equipement);
        $form->handleRequest($request);
        $User = $this->getDoctrine()->getRepository(User::class)->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $file=$equipement->getImageEquipement();
            $filename=md5(uniqid()).'.'.$file->guessExtension();
            try {
                $file->move(
                    $this->getParameter('images_directory'),
                    $filename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            $equipement->setImageEquipement($filename);
            $entityManager->persist($equipement);
            $entityManager->flush();
            foreach ($User as $User){

                $client = SMSClient::getInstance('2Yf3CBy0mWhiS0TcVCWonAOkEUXs6cLF', 'Bgflgfsi6lEN1e2V');
                $sms = new SMS($client);
                $sms->message('Nous avons ajouté un nouveau Equipment '.$equipement->getNomEquipement().'
'.$equipement->getDescriptionEquipement())
                    ->from('+21627300520')
                    ->to($User->getNumeroUtilisateur())
                    ->send();
            }

            return $this->redirectToRoute('equipement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipement/new.html.twig', [
            'equipement' => $equipement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equipement_show", methods={"GET"})
     */
    public function show(Equipement $equipement): Response
    {
        return $this->render('equipement/show.html.twig', [
            'equipement' => $equipement,
        ]);
    }
    

    /**
     * @Route("/{id}/edit", name="equipement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Equipement $equipement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipementType::class, $equipement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('equipement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipement/edit.html.twig', [
            'equipement' => $equipement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equipement_delete", methods={"POST"})
     */
    public function delete(Request $request, Equipement $equipement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($equipement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equipement_index', [], Response::HTTP_SEE_OTHER);
    }
    
    /**
     * @Route("/recherche_equipement", name="ajax_search")
     */
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        $equipement = $em->getRepository(Equipement::class)->findEntitiesByString($requestString);
        if (!$equipement) {
            $equipement['equipements']['error'] = "product introuvable 🙁 ";
        } else {
            $equipement['equipements'] = $this->getRealEntities($equipement);
        }
        return new Response(json_encode($result));
    }
    

  public function getRealEntities($Equipements){

      foreach ($Equipements as $Equipement){
          $realEntities[$Equipement->getId()] = [$Equipement->getNomEquipement() ,$Equipement->getEtatEquipement(),$Equipement->getDescriptionEquipement() ,$Equipement->getCategorieEquipement(),$Equipement->getImageEquipement()];
      }

      return $realEntities;
  }

}
