<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form;

use Knp\Component\Pager\PaginatorInterface;

use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/offre")
 */
class OffreController extends AbstractController
{
    /**
     * @Route("/", name="offre_index", methods={"GET"})
     */
    public function index(OffreRepository $offreRepository): Response
    {
        return $this->render('offre/index.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }

    /***************************IndexFront **************************/
    /**
     * @Route("/indexOffreTest", name="offre_indexOffreTest", methods={"GET"})
     */
    public function indexF(OffreRepository $offreRepository): Response
    {
        return $this->render('offre/indexOffreTest.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="offre_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $errors = $validator->validate($offre);
            if (count($errors) > 0) {
                /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
                $errorsString = (string) $errors;

                return new Response($errorsString);
                return $this->render('offre/_form.html.twig', [
                    'errors' => $errors,
                ]);
            }

            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('offre_indexOffreTest', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offre/new.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);
    }

    /****************Show Front******************** */
    /**
     * @Route("/offreFront/{id}", name="offre_showFront", methods={"GET"})
     */
    public function showF(Offre $offre): Response
    {
        return $this->render('offre/showFront.html.twig', [
            'offre' => $offre,
        ]);
    }

    /**
     * @Route("/{id}", name="offre_show", methods={"GET"})
     */
    public function show(Offre $offre): Response
    {
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offre_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Offre $offre, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validator->validate($offre);

            if (count($errors) > 0) {
                /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
                $errorsString = (string) $errors;

                return new Response($errorsString);
                return $this->render('offre/_form.html.twig', [
                    'errors' => $errors,
                ]);
            }

            $entityManager->flush();

            return $this->redirectToRoute('offre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offre/edit.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);
    }

    //offre delete test
    //DELETE 

    /**
     * @Route("/offre/delete/{id}",name="delete_offre")
     * @Method({"DELETE"})
     */
    /*public function deleteo(Request $request, $id)
    {
        $offre = $this->getDoctrine()->getRepository(Offre::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($offre);
        $entityManager->flush();
        $response = new Response();
        $response->send();
        $this->addFlash('success', 'Article Deleted!');
        return $this->redirectToRoute('offre_index');
    }
*/
    /**
     * @Route("/{id}", name="offre_delete", methods={"POST"})
     */
    public function delete(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $offre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($offre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offre_index', [], Response::HTTP_SEE_OTHER);
    }
}
