<?php

namespace App\Controller;

use App\Entity\Localisation;
use App\Form\LocalisationType;
use App\Repository\LocalisationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/localisation")
 */
class LocalisationController extends AbstractController
{
    /**
     * @Route("/", name="localisation_index", methods={"GET"})
     */
    public function index(LocalisationRepository $localisationRepository): Response
    {
        return $this->render('localisation/index.html.twig', [
            'localisations' => $localisationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="localisation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $localisation = new Localisation();
        $form = $this->createForm(LocalisationType::class, $localisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($localisation);
            $entityManager->flush();

            return $this->redirectToRoute('localisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('localisation/new.html.twig', [
            'localisation' => $localisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/plans", name="localisation_show", methods={"GET"})
     */
    public function show(Localisation $localisation): Response
    {
        return $this->render('localisation/show.html.twig', [
            'localisation' => $localisation,
        ]);
    }

    /**
     * @Route("/{id}", name="localisation_showfront", methods={"GET"})
     */
    public function showfront(Localisation $localisation): Response
    {
        return $this->render('planinng/showfront.html.twig', [
            'localisation' => $localisation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="localisation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Localisation $localisation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LocalisationType::class, $localisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('localisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('localisation/edit.html.twig', [
            'localisation' => $localisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="localisation_delete", methods={"POST"})
     */
    public function delete(Request $request, Localisation $localisation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$localisation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($localisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('localisation_index', [], Response::HTTP_SEE_OTHER);
    }
}
