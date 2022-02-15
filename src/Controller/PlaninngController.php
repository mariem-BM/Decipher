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
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
    public function new(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $planinng = new Planinng();
        $form = $this->createForm(PlaninngType::class, $planinng);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $errors = $validator->validate($planinng);
            if (count($errors) > 0) {
                /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
                $errorsString = (string) $errors;

                return new Response($errorsString);
                return $this->render('planning/_form.html.twig', [
                    'errors' => $errors,
                ]);
            }
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
    public function edit(Request $request, Planinng $planinng, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $form = $this->createForm(PlaninngType::class, $planinng);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $errors = $validator->validate($planinng);
            if (count($errors) > 0) {
                /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
                $errorsString = (string) $errors;

                return new Response($errorsString);
                return $this->render('planning/_form.html.twig', [
                    'errors' => $errors,
                ]);
            }
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
