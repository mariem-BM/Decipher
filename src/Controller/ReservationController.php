<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use App\Entity\Billet;
use App\Form\ReservationType;
use App\Form\SearchReservationType;
use App\Form\ReservationEmailType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
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
     * @Route("/listReservationByDate", name="listReservationByDate", methods={"GET"})
     */
    public function listReservationByDate(ReservationRepository $repo)
    {
        //list of reservations order By Date
        $reservationsByDate = $repo->orderByDate();
        //list of reservations order By Mail
        $reservationsByMail = $repo->orderByMail();
        //orderByDate();
        return $this->render('reservation/listByDate.html.twig', [
            "reservationsByDate" => $reservationsByDate,
            "reservationsByMail" => $reservationsByMail
        ]);
    }

    /**
     * @Route("/listReservationWithSearch", name="listReservationWithSearch", methods={"GET"})
     */
    public function listReservationWithSearch(Request $request, ReservationRepository $repository)
    {
        //All of reservations
        $reservations = $repository->findAll();
        //search
        $searchForm = $this->createForm(SearchReservationType::class);
        $searchForm->add("Recherche", SubmitType::class);
        $searchForm->handleRequest($request);
        if ($searchForm->isSubmitted()) {
            $id = $searchForm['id']->getData();
            $resultOfSearch = $repository->searchReservation($id);
            return $this->render('reservation/searchReservation.html.twig', array(
                "resultOfSearch" => $resultOfSearch,
                "searchReservation" => $searchForm->createView()));
        }
        return $this->render('reservation/listWithSearch.html.twig', array(
            "reservations" => $reservations,
            "searchReservation" => $searchForm->createView()));
    }
 

     /**
     * @Route("/mesreservations", name="reservation_front", methods={"GET"})
     */
    public function indexfront(ReservationRepository $reservationRepository): Response
    { 

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
            $reservation->setDateReservation(new \DateTime());
            $entityManager->flush();
            $this->addFlash('success', 'Reserved Successfully! please await for a confirmation email');
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
     * @Route("/ReservationBillet/{id}", name="ReservationBillet", methods={"GET"})
     */
    public function ReservationBillet(Reservation $reservation): Response
    {
        return $this->render('reservation/ReservationBillet.html.twig', [
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
     * @Route("/Ticketpdf/{id}", name="Ticketpdf", methods={"GET"})
     */
    public function Ticketpdf(Reservation $reservation): Response
    {
      
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        //$pdfOptions->set('defaultFont', 'Arial');
  
        $pdfOptions->setIsPhpEnabled(true);
        $pdfOptions->setIsHtml5ParserEnabled(true); // For combining multiple pdf outputs
        $pdfOptions->setIsFontSubsettingEnabled(true);
        $pdfOptions->setDefaultPaperSize('A4');
        $pdfOptions->setDebugCss(true);
        $pdfOptions->setDebugLayout(true);
        $pdfOptions->setDpi(72);
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('reservation/ReservationBillet.html.twig', [
            'reservation' => $reservation
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        return $this->render('reservation/ReservationBillet.html.twig', [
            'reservation' => $reservation,
        ]);
    }

     /**
     * @Route("/MailingReservationBillet/{id}", name="MailingReservationBillet", methods={"GET", "POST"})
     */
    public function MailingReservationBillet(Request $request,Reservation $reservation, \Swift_Mailer $mailer): Response
    {
        $form = $this->createForm(ReservationEmailType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
       
            dump($contactFormData);
           foreach ($contactFormData as $email) {
    $message = (new \Swift_Message('Hello Email'))
       
        ->setFrom('pawp6703@gmail.com')
       ->setTo($contactFormData['user'])
       // ->setTo('zeinebeyarahmani@gmail.com')
        ->setBody(
            $this->renderView(
                'reservation/ReservationBillet.html.twig',
                ['reservation' => $reservation]
            ),
            'text/html'
        );
        
    $mailer->send($message);
    }
    $this->addFlash('success', 'It sent!');
    return $this->redirectToRoute('reservation_index');
        }
    return $this->render('reservation/mail.html.twig', [
        'reservation' => $reservation,
        'our_form' => $form,
        'our_form' => $form->createView(),
    ]);
  //  return $this->render(...);
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
 
    
}
