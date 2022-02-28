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
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use Symfony\Component\Serializer\SerializerInterface;
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
     * @Route("/plans", name="planinng_front", methods={"GET"})
     */
    public function indexfront(PlaninngRepository $planinngRepository): Response
    {
        return $this->render('planinng/indexfront.html.twig', [
            'planinngs' => $planinngRepository->findAll(),
        ]);
    }

//Tri par date

     /**
     * @Route("/listPlanByDate", name="listPlanByDate", methods={"GET"})
     */
    public function listPlanByDate(PlaninngRepository $repo)
    {

        $planinngsByDate = $repo->orderByDatePlan();

        //orderByDate();
        return $this->render('planinng/listByDatePlan.html.twig', [
            "planinngsByDate" => $planinngsByDate,
        ]);
    }




    //Tri par periode

     /**
     * @Route("/listPlanByPeriode", name="listPlanByPeriode", methods={"GET"})
     */
    public function listPlanByPeriode(PlaninngRepository $repos)
    {

        $planinngsByPeriode = $repos->orderByPeriodePlan();

        //orderByPeriode();
        return $this->render('planinng/listByPeriodePlan.html.twig', [
            "planinngsByPeriode" => $planinngsByPeriode,
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

/////JSON//////////////////////////////////////////
/**
     * @Route("/APlaninng", name="APlaninng", methods={"GET"})
     */
    public function JSONindex(PlaninngRepository $PlaninngRepository,SerializerInterface $serializer): Response
    {
        $result = $PlaninngRepository->findAll();
        /* $n = $normalizer->normalize($result, null, ['groups' => 'livreur:read']);
        $json = json_encode($n); */
        $json = $serializer->serialize($result, 'json', ['groups' => 'Planinng:read']);
        return new JsonResponse($json, 200, [], true);
    }

   
    /**
     * @Route("/plans", name="planinng_show", methods={"GET"})
     */
    public function show(Planinng $planinng): Response
    {
        return $this->render('planinng/show.html.twig', [
            'planinng' => $planinng,
        ]);
    }
    
     /**
     * @Route("/{id}", name="planinng_showfront", methods={"GET"})
     */
    public function showfront(Planinng $planinng): Response
    {
        return $this->render('planinng/showfront.html.twig', [
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
