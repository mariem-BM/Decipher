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
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Repository\CategoriePostRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/reservation")
 */
class ReservationController extends AbstractController
{
    /**
     * @Route("/", name="reservation_index", methods={"GET"})
     */
    public function index(Request $request,ReservationRepository $reservationRepository, PaginatorInterface $paginator): Response
    {// Retrieve the entity manager of Doctrine
        $em = $this->getDoctrine()->getManager();
        // Get some repository of data, in our case we have an Billet entity
        $reservationRepository = $em->getRepository(Reservation::class);
        // Find all the data on the billets table, filter your query as you need
        $allReservationQuery = $reservationRepository->createQueryBuilder('p')
            ->where('p.Etat_reservation != :Etat_reservation')
            ->setParameter('Etat_reservation', 'canceled')
            ->getQuery();
             // Paginate the results of the query
          $reservations = $paginator->paginate(
              // Doctrine Query, not results
              $allReservationQuery,
              // Define the page parameter
              $request->query->getInt('page', 1),
              // Items per page
              5
          );
          return $this->render('reservation/index.html.twig', [
            //  'reservations' => $reservationRepository->findAll(),
              'reservations' => $reservations,
          ]);
       
    }


    /*****************************************************************************************************/
    /**
     * @Route("/AllReservations/json", name="AllReservations")
     */
    public function AllReservations(ReservationRepository $rep,SerializerInterface $serilazer):Response
    {
        $reservations= $rep->findAll();

        $json= $serilazer->serialize($reservations,'json',['groups'=>"reservation:read"]);
        return new JsonResponse($json,200,[],true);
    }
    /**
     * @Route("/AddReservations/json/{user}/{id}", name="AddReservations")
     */
    public function AddReservationsJSON(User $user,Billet $id,Request $request,SerializerInterface $serilazer, EntityManagerInterface $em)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = new Reservation();
        $date_reservation = new \DateTime("now");
       // $user = $this->getUser();
        $user = $em->getRepository(User::class)->find($user);
       // $billet = $this->getBillet();
      // $billet=$this->getDoctrine()->getRepository(Billet::class)->findBy(array('reservation' => $id));
       $billet = $em->getRepository(Billet::class)->find($id);
       $Etat_reservation = 'waiting for a confirmation';
       //$reservation->setUser($request->get('user'));
        $reservation->setUser($user);
        $reservation->setBillet($billet);
        $reservation->setDateReservation($date_reservation);
        $reservation->setEtatReservation($Etat_reservation);

        $em->persist($reservation);
        $em->flush();

       $jsonContent= $serilazer->serialize($reservation,'json',['groups'=>"reservation:read"]);
       return new Response(json_encode($jsonContent));


    }

    /**
     * @Route("/UpdateReservations/json/{id}/{user}/{billet_id}", name="UpdateReservations")
     */
    public function UpdateReservationsJSON(Request $request,SerializerInterface $serilazer,$id,Billet $billet_id,User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $reservation = $em->getRepository(Reservation::class)->find($id);
        $billet = $em->getRepository(Billet::class)->find($billet_id);
        $date_reservation = new \DateTime("now");
        $user = $em->getRepository(User::class)->find($user);
        $Etat_reservation = 'waiting for a confirmation';
       // $reservation->setUser($request->get('user'));
        //$reservation->setBillet($request->get('billet'));
        $reservation->setUser($user);
        $reservation->setBillet($billet);
        $reservation->setDateReservation($date_reservation);
        $reservation->setEtatReservation($Etat_reservation);

        $em->persist($reservation);
        $em->flush();
        $jsonContent= $serilazer->serialize($reservation,'json',['groups'=>"reservation:read"]);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/DetailReservations/json/{id}/{user}", name="DetailReservations")
     */
    public function DetailReservationsJSON(Request $request,SerializerInterface $serilazer,$id/*, User $user*/):Response
    {
        $em = $this->getDoctrine()->getManager();
        
      // $user= $em->getRepository(User::class)->find($user);
        $reservation= $em->getRepository(Reservation::class)->find($id);
        $user = $this->getUser();
        $json= $serilazer->serialize($reservation,'json',['groups'=>"reservation:read"]);
        return new JsonResponse($json,200,[],true);
    }

    /**
     * @Route("/DeleteReservations/json/{id}", name="DeleteReservations")
     */
    public function DeleteReservationsJSON(Request $request,SerializerInterface $serilazer,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $reservation = $em->getRepository(Reservation::class)->find($id);
        $em->remove($reservation);
        $em->flush();
        $jsonContent= $serilazer->serialize($reservation,'json',['groups'=>"reservation:read"]);
        return new Response(json_encode($jsonContent));;
    }
    /**
     * @Route("/listReservationByDate/api/showOrdered", name="api_Reservations_showOrderedByDate")
     */
    public function showOrderedReservationsByDate(ReservationRepository $rep,SerializerInterface $serilazer):Response
    {
        $reservationsByDate = $rep->orderByDate();

        $serializer = new Serializer([new DateTimeNormalizer(), new ObjectNormalizer()]);
       $json= $serilazer->serialize($reservationsByDate,'json',['groups'=>"reservation:read"]);
        return new JsonResponse($json,200,[],true);
    }
    /**
     * @Route("/listReservationByMail/api/showOrdered", name="api_Reservations_showOrderedByMail")
     */
    public function showOrderedReservationsByMail(ReservationRepository $rep,SerializerInterface $serilazer):Response
    {
        $reservationsByDate = $rep->orderByMail();

        $serializer = new Serializer([new DateTimeNormalizer(), new ObjectNormalizer()]);
       $json= $serilazer->serialize($reservationsByDate,'json',['groups'=>"reservation:read"]);
        return new JsonResponse($json,200,[],true);
    }
    /**
     * @Route("/listReservationByEtat/api/showOrdered", name="api_Reservations_showOrderedByEtat")
     */
    public function showOrderedReservationsByEtat(ReservationRepository $rep,SerializerInterface $serilazer):Response
    {
        $reservationsByDate = $rep->orderByEtat();

        $serializer = new Serializer([new DateTimeNormalizer(), new ObjectNormalizer()]);
       $json= $serilazer->serialize($reservationsByDate,'json',['groups'=>"reservation:read"]);
        return new JsonResponse($json,200,[],true);
    }
    /**
     * @Route("/traiterreservation/api/{id}/{user}/{billet_id}",name="traiterreservation_api")
     */
    public function traiterreservationAPI(Billet $billet_id,User $user,$id,SerializerInterface $serilazer,Request $request, ReservationRepository $Rep,Reservation $reservation, \Swift_Mailer $mailer ): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $billet = $entityManager->getRepository(Billet::class)->find($billet_id);
        $user = $entityManager->getRepository(User::class)->find($user);
       
        $reservation = $entityManager->getRepository(Reservation::class)->find($id);
        $reservation->setEtatReservation("confirmed");
        $reservation->setUser($user);
        $reservation->setBillet($billet);
        $entityManager->flush();
        $form = $this->createForm(ReservationEmailType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
           // Ici nous enverrons l'e-mail
            $message = (new \Swift_Message('Celestial Reservation Confirmation') )
            //On attribue l'expediteur
            ->setFrom('celestialservice489@gmail.com')
            // destinataire
            ->setTo($contact['email'])
            // le contenu de notre msg avec Twig
            ->setBody("Your Reservation has been confirmed enjoy your trip!!!",'text/html') ;
            //on envoie le msg
            $mailer->send($message);
            $this->addFlash('message', 'le message a ete envoye');
            $mailer->send($message);
            $this->addFlash('success', 'It sent!');
        }
          
            $jsonContent= $serilazer->serialize($reservation,'json',['groups'=>"reservation:read"]);
            return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/cancelreservation/api/{id}/{user}/{billet_id}",name="cancelreservation_api")
     */
    public function cancelreservationAPI(Billet $billet_id,User $user,SerializerInterface $serilazer,Request $request, ReservationRepository $Rep,Reservation $reservation): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $billet = $entityManager->getRepository(Billet::class)->find($billet_id);
        $user = $entityManager->getRepository(User::class)->find($user);
       
        $reservation->setEtatReservation("cancelled");
        $reservation->setUser($user);
        $reservation->setBillet($billet);
        $entityManager->flush();
        $jsonContent= $serilazer->serialize($reservation,'json',['groups'=>"reservation:read"]);
        return new Response(json_encode($jsonContent));
    }
    /*****************************************************************************************************/

     /**
     * @Route("/listReservationByDate", name="listReservationByDate", methods={"GET"})
     */
    public function listReservationByDate(ReservationRepository $repo)
    {
        //list of reservations order By Date
        $reservationsByDate = $repo->orderByDate();

        return $this->render('reservation/listByDate.html.twig', [
            "reservationsByDate" => $reservationsByDate,
        ]);
    }
      /**
     * @Route("/listReservationByMail", name="listReservationByMail", methods={"GET"})
    */
    public function listReservationByMail(ReservationRepository $repo)
    {
       
        $reservationsByMail = $repo->orderByMail();
    
        return $this->render('reservation/listByDate.html.twig', [
 
            "reservationsByMail" => $reservationsByMail,
          
        ]);
    }
         /**
     * @Route("/listReservationByEtat", name="listReservationByEtat", methods={"GET"})
    */
    public function listReservationByEtat(ReservationRepository $repo)
    {
       
        $reservationsByEtat = $repo->orderByEtat();
    
        return $this->render('reservation/listByDate.html.twig', [
 
            "reservationsByEtat" => $reservationsByEtat,
          
        ]);
    }
       /**
     * @Route("/listReservationByDatefront", name="listReservationByDatefront", methods={"GET"})
     */
    public function listReservationByDatefront(ReservationRepository $repo,CategoriePostRepository $repo1)
    {
        //list of reservations order By Date
        $reservationsByDate = $repo->orderByDate();

        return $this->render('reservation/listByDatefront.html.twig', [
            "reservationsByDate" => $reservationsByDate,'categoryPost'=>$repo1->findAll()
        ]);
    }
      /**
     * @Route("/listReservationByMailfront", name="listReservationByMailfront", methods={"GET"})
    */
    public function listReservationByMailfront(ReservationRepository $repo,CategoriePostRepository $repo1)
    {
       
        $reservationsByMail = $repo->orderByMail();
    
        return $this->render('reservation/listByDatefront.html.twig', [
 
            "reservationsByMail" => $reservationsByMail,'categoryPost'=>$repo1->findAll()
          
        ]);
    }
         /**
     * @Route("/listReservationByEtatfront", name="listReservationByEtatfront", methods={"GET"})
    */
    public function listReservationByEtatfront(ReservationRepository $repo,CategoriePostRepository $repo1)
    {
       
        $reservationsByEtat = $repo->orderByEtat();
    
        return $this->render('reservation/listByDatefront.html.twig', [
 
            "reservationsByEtat" => $reservationsByEtat,'categoryPost'=>$repo1->findAll()
          
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
    public function indexfront(Request $request,ReservationRepository $reservationRepository, PaginatorInterface $paginator,CategoriePostRepository $repo): Response
    { 
      // Retrieve the entity manager of Doctrine
      $em = $this->getDoctrine()->getManager();
     
      // Get some repository of data, in our case we have an Billet entity
      $reservationRepository = $em->getRepository(Reservation::class);
      // Find all the data on the billets table, filter your query as you need
      $allReservationQuery = $reservationRepository->createQueryBuilder('p')
          ->where('p.Etat_reservation != :Etat_reservation')
          ->setParameter('Etat_reservation', 'canceled')
          ->getQuery();
           // Paginate the results of the query
        $reservations = $paginator->paginate(
            // Doctrine Query, not results
            $allReservationQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            5
        );
        return $this->render('reservation/indexfront.html.twig', [
          //  'reservations' => $reservationRepository->findAll(),
            'reservations' => $reservations,'categoryPost'=>$repo->findAll()
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
    public function new(Request $request, EntityManagerInterface $entityManager,CategoriePostRepository $repo): Response
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
            'form' => $form->createView(),'categoryPost'=>$repo->findAll()
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
    public function showfront(Reservation $reservation,CategoriePostRepository $repo): Response
    {
        return $this->render('reservation/showfront.html.twig', [
            'reservation' => $reservation,'categoryPost'=>$repo->findAll()
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
     /*$message = (new \Swift_Message('Celestial Reservation Confirmation ')) 
     ->setFrom('pawp6703@gmail.com')
     ->setTo('zeinebeyarahmani@gmail.com')
     ->setBody("Your Reservation has been confirmed enjoy your trip!!! your reservation id is {$reservation->getid()}, ",'text/html') ;
        $mailer->send( $message);
         $this->addFlash('success', 'It sent!');
        return $this->redirectToRoute('reservation_index');*/
        $form = $this->createForm(ReservationEmailType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
           // Ici nous enverrons l'e-mail
            $message = (new \Swift_Message('Celestial Reservation Confirmation') )
            //On attribue l'expediteur
            ->setFrom('celestialservice489@gmail.com')
            // destinataire
            ->setTo($contact['email'])
            // le contenu de notre msg avec Twig
            ->setBody("Your Reservation has been confirmed enjoy your trip!!!",'text/html') ;
            //on envoie le msg
            $mailer->send($message);
            $this->addFlash('message', 'le message a ete envoye');
        $mailer->send($message);
        
         $this->addFlash('success', 'It sent!');
         return $this->redirectToRoute('reservation_index');
        }
         return $this->render('reservation/mail.html.twig', [
            'reservation' => $reservation,
        'our_form' => $form,
        'our_form' => $form->createView(),
            ]);
    }
    /**
     * @Route("/cancelreservation/{id}",name="cancelreservation")
     */
    public function cancelreservation(Request $request, ReservationRepository $Rep,Reservation $reservation,CategoriePostRepository $repo): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reservation->setEtatReservation("cancelled");
        $entityManager->flush();
        return $this->render('reservation/showfront.html.twig', [
            'reservation' => $reservation,'categoryPost'=>$repo->findAll()
        ]);
    }
 /**
     * @Route("/MailingReservationBillet/{id}", name="MailingReservationBillet")
     */
    public function MailingReservationBillet(Request $request, \Swift_Mailer $mailer,Reservation $reservation)
    {
        $form = $this->createForm(ReservationEmailType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
           // Ici nous enverrons l'e-mail
          
            $message = (new \Swift_Message('Nouveau contact') )
            //On attribue l'expediteur
           
            ->setFrom('celestialservice489@gmail.com')
            // destinataire

            ->setTo($contact['email'])
            
            // le contenu de notre msg avec Twig
            ->setBody("Your Reservation has been confirmed enjoy your trip!!!",'text/html') ;
            //on envoie le msg
            $mailer->send($message);
            $this->addFlash('message', 'le message a ete envoye');
        $mailer->send($message);
        
         $this->addFlash('success', 'It sent!');
         return $this->redirectToRoute('reservation_index');
        }
         return $this->render('reservation/mail.html.twig', [
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
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager,CategoriePostRepository $repo): Response
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
            'form' => $form->createView(),'categoryPost'=>$repo->findAll()
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

      $reservations =  $em->getRepository(Reservation::class)->findReservationsByString($requestString);

      if(!$reservations) {
          $result['reservations)']['error'] = "keine Eintr??ge gefunden";
      } else {
          $result['reservations)'] = $this->getRealEntities($reservations);
      }

      return new Response(json_encode($result));
      
  }

  public function getRealEntities($reservations){

      foreach ($reservations as $reservation){
          $realEntities[$reservation->getId()] = [$reservation->getDateReservation(),$reservation->getUser(),$reservation->getBillet(),$reservation->getEtatReservation()];
      }

      return $realEntities;
    }
 
  
}
