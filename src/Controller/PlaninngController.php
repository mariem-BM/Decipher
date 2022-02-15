<?php

namespace App\Controller;

use App\Entity\Planinng;
use App\Form\PlaninngType;
use App\Repository\PlaninngRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/planinng")
 */
class PlaninngController extends AbstractController
{
    /**
     * @Route("/", name="planinng_index", methods={"GET"})
     */
    public function index(PlaninngRepository $planinngRepository): Response
    {
        return $this->render('planinng/index.html.twig', [
            'planinngs' => $planinngRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="planinng_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $planinng = new Planinng();
        $form = $this->createForm(PlaninngType::class, $planinng);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($planinng);
            $entityManager->flush();

            return $this->redirectToRoute('planinng_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('planinng/new.html.twig', [
            'planinng' => $planinng,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="planinng_show", methods={"GET"})
     */
    public function show(Planinng $planinng): Response
    {
        return $this->render('planinng/show.html.twig', [
            'planinng' => $planinng,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="planinng_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Planinng $planinng, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlaninngType::class, $planinng);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('planinng_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('planinng/edit.html.twig', [
            'planinng' => $planinng,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="planinng_delete", methods={"POST"})
     */
    public function delete(Request $request, Planinng $planinng, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planinng->getId(), $request->request->get('_token'))) {
            $entityManager->remove($planinng);
            $entityManager->flush();
        }

        return $this->redirectToRoute('planinng_index', [], Response::HTTP_SEE_OTHER);
    }
}
