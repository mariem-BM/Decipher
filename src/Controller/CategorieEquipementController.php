<?php

namespace App\Controller;

use App\Entity\CategorieEquipement;
use App\Form\CategorieEquipementType;
use App\Repository\CategorieEquipementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorie/equipement")
 */
class CategorieEquipementController extends AbstractController
{
    /**
     * @Route("/affiche", name="categorie_equipement_index", methods={"GET"})
     */
    public function index(CategorieEquipementRepository $categorieEquipementRepository): Response
    {
        return $this->render('categorie_equipement/index.html.twig', [
            'categorie_equipements' => $categorieEquipementRepository->findAll(),
        ]);
    }
    /**
     * param CategorieEquipementRepository $Repository
     * return use Symfony\Component\HttpFoundation\Response;
     * @Route("/display")
     */
    public function indexback(CategorieEquipementRepository $Repository)
    {
        $categorie=$Repository->findAll ();
        return $this->render('categorie_equipement/indexback.html.twig', [
            'equipements' => $categorie,
        ]);
    }

    /**
     * @Route("/new", name="categorie_equipement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categorieEquipement = new CategorieEquipement();
        $form = $this->createForm(CategorieEquipementType::class, $categorieEquipement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categorieEquipement);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_equipement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_equipement/new.html.twig', [
            'categorie_equipement' => $categorieEquipement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_equipement_show", methods={"GET"})
     */
    public function show(CategorieEquipement $categorieEquipement): Response
    {
        return $this->render('categorie_equipement/show.html.twig', [
            'categorie_equipement' => $categorieEquipement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorie_equipement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CategorieEquipement $categorieEquipement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategorieEquipementType::class, $categorieEquipement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('categorie_equipement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_equipement/edit.html.twig', [
            'categorie_equipement' => $categorieEquipement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_equipement_delete", methods={"POST"})
     */
    public function delete(Request $request, CategorieEquipement $categorieEquipement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieEquipement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($categorieEquipement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorie_equipement_index', [], Response::HTTP_SEE_OTHER);
    }
}
