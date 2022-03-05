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
        //$reservations = $reservationRepository->findOneByIdUser($this->getUser()->getId(),$reservationRepository->findAll());
        return $this->render('reservation/indexfront.html.twig', [
            'reservations' => $reservationRepository->findAll(),
           // 'reservations' => $reservations,
        ]);
    }
  
     /**
     * @Route("/imprimerlistreservation", name="imprimerlistreservation",  methods={"GET"})
     */
    public function imprimerlistreservation(Request $request,ReservationRepository $reservationRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $reservations = $reservationRepository->findAll();
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('reservation/imprimerlistreservation.html.twig', [
            'reservations' => $reservations,
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
        return $this->render('reservation/imprimerlistreservation.html.twig', [
            'reservations' => $reservations,
        ]);
    }
    
    /**
     * @Route("/new", name="reservation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
       
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager->persist($reservation);
            $reservation->setDateReservation(new \DateTime());
            $reservation->setEtatReservation('waiting for a confirmation');
            $entityManager->flush();

            $this->addFlash('success', 'Reserved Successfully! please await for a confirmation email');
            return $this->redirectToRoute('reservation_front', [], Response::HTTP_SEE_OTHER);
        }
     /*   $user = $this->getUser();
        $reservation = new Reservation();
        $reservation->setUser($user);
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        dump($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_show', [
                'reservation' => $reservation,
            ]);
        }*/

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
     * @Route("/traiterreservation/{id}",name="traiterreservation")
     */
    public function traiterreservation(Request $request, ReservationRepository $Rep,Reservation $reservation, \Swift_Mailer $mailer ): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reservation->setEtatReservation("confirmed");
        $entityManager->flush();
        /*return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);*/
        $form = $this->createForm(ReservationEmailType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
       
            dump($contactFormData);
           
    $message = (new \Swift_Message('Hello Email'))
       
        ->setFrom('pawp6703@gmail.com')
       ->setTo($contactFormData)
       // ->setTo('zeinebeyarahmani@gmail.com')
        ->setBody(
            $this->renderView(
                'reservation/ReservationBillet.html.twig',
                ['reservation' => $reservation]
            ),
            'text/html'
        );
        
    $mailer->send($message);
    
    $this->addFlash('success', 'It sent!');
    return $this->redirectToRoute('reservation_index');
        }
    
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
            'our_form' => $form,
        'our_form' => $form->createView(),
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
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $reservation->setDateReservation(new \DateTime());
            $reservation->setEtatReservation('waiting for a confirmation');
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
  
       
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('reservation/ReservationBillet.html.twig', [
            'reservation' => $reservation
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
       // $dompdf->setPaper('A4', 'portrait');

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
 
    /**
    * @Route("/listReservationSearchDate", name="listReservationSearchDate")
    */
   public function listReservationSearchDate(ReservationRepository $em)
   {
       //$repository = $this->getDoctrine()->getRepository(Student::class);
       //Show all students
       $reservations = $em->ReservationsPerDate(new \DateTime('2000-11-02'), new \DateTime('2020-11-02 00:00:00'));


       return $this->render('reservation/listWithSearchDate.html.twig', ['reservations' => $reservations]);
   }

   /**
   * @Route("/searchreservation", name="ajax_searchreservation", methods={"GET"})
   */
  public function searchAction(Request $request)
  {
      $em = $this->getDoctrine()->getManager();

      $requestString = $request->get('q');

      $reservations =  $em->getRepository('AppBundle:Reservation')->findReservationsByString($requestString);

      if(!$reservations) {
          $result['reservations)']['error'] = "keine Einträge gefunden";
      } else {
          $result['reservations)'] = $this->getRealReservations($reservations);
      }

      return new Response(json_encode($result));
  }

  public function getRealReservations($reservations){

      foreach ($reservations as $reservation){
          $realReservations[$reservation->getId()] = [$reservation->getDateReservation(),$reservation->getUser(),$reservation->getBillet()];
      }

      return $realReservations;
  }
}
