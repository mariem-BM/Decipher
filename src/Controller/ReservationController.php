<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use App\Entity\Billet;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/reservation")
 */
class ReservationController extends AbstractController
{
    /**
     * @Route("/", name="reservation_index", methods={"GET"})
     */
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }


    /**
     * @Route("/listReservationWithSearch", name="listReservationWithSearch", methods={"GET"})
     */
    public function listReservationWithSearch(Request $request, ReservationRepository $repository)
    {
        //All of reservations
        $reservations = $repository->findAll();
        //list of reservations order By Mail
        $reservationsByMail = $repository->orderByMail();
        //search
        $searchForm = $this->createForm(SearchReservationType::class);
        $searchForm->add("Recherche", SubmitType::class);
        $searchForm->handleRequest($request);
        if ($searchForm->isSubmitted()) {
            $nsc = $searchForm['user']->getData();
            $resultOfSearch = $repository->searchReservation($user);
            return $this->render('reservation/searchReservation.html.twig', array(
                "resultOfSearch" => $resultOfSearch,
                "searchReservation" => $searchForm->createView()));
        }
        return $this->render('reservation/listWithSearch.html.twig', array(
            "reservations" => $reservations,
            "reservationsByMail" => $reservationsByMail,
            "searchReservation" => $searchForm->createView()));
    }
    
    /**
     * @Route("/listReservationByDate", name="listReservationByDate", methods={"GET"})
     */
    public function listReservationByDate(ReservationRepository $repo)
    {

        $reservationsByDate = $repo->orderByDate();

        //orderByDate();
        return $this->render('reservation/listByDate.html.twig', [
            "reservationsByDate" => $reservationsByDate,
        ]);
    }

 

     /**
     * @Route("/mesreservations", name="reservation_front", methods={"GET"})
     */
    public function indexfront(ReservationRepository $reservationRepository): Response
    { /*  $user = new User(); 
        $user = $this->getUser()->getReservations();*/

        return $this->render('reservation/indexfront.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reservation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,ValidatorInterface $validator): Response
    {
       // $user = new User();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validator->validate($reservation);
            if (count($errors) > 0) {
                /*
                 * Uses a __toString method on the $errors variable which is a
                 * ConstraintViolationList object. This gives us a nice string
                 * for debugging.
                 */
                $errorsString = (string) $errors;
        
                return new Response($errorsString);
            }
            $entityManager->persist($reservation);
            $entityManager->flush();
            $this->addFlash('success', 'Reserved Successfully!');
            return $this->redirectToRoute('reservation_front', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_show", methods={"GET"})
     */
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }
     /**
     * @Route("/showfront/{id}", name="reservationfront_show", methods={"GET"})
     */
    public function showfront(Reservation $reservation): Response
    {
        return $this->render('reservation/showfront.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager,ValidatorInterface $validator): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validator->validate($reservation);
            if (count($errors) > 0) {
                /*
                 * Uses a __toString method on the $errors variable which is a
                 * ConstraintViolationList object. This gives us a nice string
                 * for debugging.
                 */
                $errorsString = (string) $errors;
        
                return new Response($errorsString);
            }
            $entityManager->flush();
            $this->addFlash('success', 'Reservation Edited!');
            return $this->redirectToRoute('reservation_front', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_delete", methods={"POST"})
     */
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }
        $this->addFlash('success', 'Reservation Deleted!');
        return $this->redirectToRoute('reservation_front', [], Response::HTTP_SEE_OTHER);
    }
/***************************************************************************************************************************/
     /**
     * @Route("/myreservation/{id}", name="showreservationbyuser", methods={"GET"})
     */
    public function showBillet($id)
    {
      $user = $this->getDoctrine()->getRepository(User::class)->find($id);
      $reservations= $this->getDoctrine()->getRepository(Reservation::class)->listReservationByUser($user->getId());
      return $this->render('reservation/showreservationbyuser.html.twig', [
          "user" => $user,
          "reservations"=>$reservations]);
     } 
     
   
}