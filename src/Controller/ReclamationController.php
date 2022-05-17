<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\User;
use App\Form\ContactType;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Reflection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\Json;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SeriInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Flex\Unpack\Result;
use App\Repository\CategoriePostRepository;
/**
 * @Route("/reclamation")
 */
class ReclamationController extends AbstractController
{
    /**
     * @Route("/", name="reclamation_index", methods={"GET"})
     */
    public function index(Request $request,ReclamationRepository $reclamationRepository, PaginatorInterface $paginator): Response
    {

        $em = $this->getDoctrine()->getManager();
        // Get some repository of data, in our case we have an Billet entity
        $reclamationRepository = $em->getRepository(Reclamation::class);
        // Find all the data on the billets table, filter your query as you need
       
        $allReclamationQuery = $reclamationRepository->createQueryBuilder('r')
           // ->where('o.nom_offre = :nom_offre')
          //  ->setParameter('id', 'canceled')
            ->getQuery();
             // Paginate the results of the query
          $reclamations = $paginator->paginate(
              // Doctrine Query, not results
              $allReclamationQuery,
              // Define the page parameter
              $request->query->getInt('page', 1),
              // Items per page
              3
          );
          
        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamations,
        ]);
        

      
    }

    /********* **************** Index Front*********** ***************/

    /**
     * @Route("/reclamation_indexreclamFront", name="reclamation_indexreclamFront", methods={"GET"})
     */
    public function indexF(Request $request,ReclamationRepository $reclamationRepository, PaginatorInterface $paginator,CategoriePostRepository $repo): Response
    {
        $em = $this->getDoctrine()->getManager();
        // Get some repository of data, in our case we have an Billet entity
        $reclamationRepository = $em->getRepository(Reclamation::class);
        // Find all the data on the billets table, filter your query as you need
       
        $allReclamationQuery = $reclamationRepository->createQueryBuilder('r')
           // ->where('o.nom_offre = :nom_offre')
          //  ->setParameter('id', 'canceled')
            ->getQuery();
             // Paginate the results of the query
          $reclamations = $paginator->paginate(
              // Doctrine Query, not results
              $allReclamationQuery,
              // Define the page parameter
              $request->query->getInt('page', 1),
              // Items per page
              6
          );
          
        return $this->render('reclamation/indexreclamFront.html.twig', [
            'reclamations' => $reclamations,'categoryPost'=>$repo->findAll()
        ]);
    }



    //Tri par date desc backk

    /**
     * @Route("/listReclamByDate", name="listReclamByDate", methods={"GET"})
     */
    public function listReclamByDate(ReclamationRepository $repo)
    {

        $reclamationsByDate = $repo->orderByDateReclam();

        //orderByDate();
        return $this->render('reclamation/listByDateReclam.html.twig', [
            "reclamationsByDate" => $reclamationsByDate,
        ]);
    }
//Tri par date asc backk

    /**
     * @Route("/listReclamByDateA", name="listReclamByDateA", methods={"GET"})
     */
    public function listReclamByDateA(ReclamationRepository $repo)
    {

        $reclamationsByDateA = $repo->orderByDateReclamA();

        //orderByDate();
        return $this->render('reclamation/listByDateReclamA.html.twig', [
            "reclamationsByDateA" => $reclamationsByDateA,
        ]);
    }
    /*************Search***************** */

    /**
     * @Route("/reclamation_search", name="reclamation_search")
     */
    /*public function searchReclamation(Request $request)
{

    $serachReclamForm = $this->createFormBuilder(SearchReclamType::class);
   return $this->render('reclamation/searchReclamation.html.twig',[
       "searchForm" => $serachReclamForm ->createView(),
   ]) ;
}*/

    /*****reclamation/indexreclamFront.html.twig*/

    /**************************ADD front************************************ */

    /**
     * @Route("/new", name="reclamation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,CategoriePostRepository $repo): Response
    {
       // $user = $this->getUser();
        $reclamation = new Reclamation();
       // $reclamation->setUser($user);
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
        //dump($user);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reclamation);
            $reclamation->setDateReclamation(new \DateTime());
            $reclamation->setEtatReclamation("envoyé");
            $entityManager->flush();

            return $this->redirectToRoute('reclamation_indexreclamFront', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reclamation/new.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),'categoryPost'=>$repo->findAll()
        ]);
    }

    /***************************Print*********************************** */

   /**
     * @Route("/listreclamation", name="listreclamation", methods={"GET"})
     */
    public function listreclamation(ReclamationRepository $reclamationRepository) : Response
    {
        $pdfOptions = new Options();
        $dompdf = new Dompdf($pdfOptions);

        
        $reclamations = $reclamationRepository->findAll();

        $html = $this->renderView('reclamation/listreclamation.html.twig', [
            'reclamations' => $reclamations,
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('mypdf.pdf', [
            "Attachment" => true
        ]);
       
        return new Response("the PDF file has benn succefully genrated");
        
    }


    /*******************JSON *******************/

    /******************affichage Reclamation*****************************************/

    /**
     * @Route("/AllReclamationss", name="AllReclamationss")
     */
    public function AllReclamations(NormalizerInterface $Normalizer)
    {

        $repository = $this->getDoctrine()->getRepository(Reclamation::class);
        $reclamations = $repository->findAll();

        $jsonContent = $Normalizer->normalize($reclamations, 'json', ['groups' => 'post:read']);

        return $this->render('reclamation/allReclamationsJSON.html.twig', [
            'data' => $jsonContent,
        ]);
    }


    /**********Ajout JSON li temchi************** */
    /**
     * @Route("/AllReclamations", name="AllReclamations", methods={"GET"})
     */
    public function JSONindex(ReclamationRepository $ReclamationRepository, SerializerInterface $serializer): Response
    {
        $result = $ReclamationRepository->findAll();
        /* $n = $normalizer->normalize($result, null, ['groups' => 'livreur:read']);
        $json = json_encode($n); */
        $json = $serializer->serialize($result, 'json', ['groups' => 'reclamation:read']);
        return new JsonResponse($json, 200, [], true);
    }

    


    /**********Récupere une reclam selon ID****************** */

    /**
     * @Route("recc/{id}", name="reclamation")
     */


    public function ReclamID(Request $request, $id, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        $jsonContent = $Normalizer->normalize($reclamation, 'json', ['groups' => 'post:read']);

        return new Response(json_encode($jsonContent));
    }




   
  

/**************************** Sending Mail ****************************/

/**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
           // Ici nous enverrons l'e-mail
            //dd($contact);
            $message = (new \Swift_Message('Celestial Service') )
            //On attribue l'expediteur
            ->setFrom($contact['email'])
            // destinataire

            ->setTo('mariembenmassoud123@gmail.com')
            
            // le contenu de notre msg avec Twig
            ->setBody(
                $this->renderView(
                    'contact/mailing.html.twig', compact('contact')
                ),
                'text/html'
            )
            ;
            //on envoie le msg
            $mailer->send($message);
            $this->addFlash('success', 'Votre email a été bien envoyé');
            return $this->redirectToRoute('reclamation_index');

        }
        return $this->render('reclamation/contact.html.twig',[
            'contactForm' => $form->createView()
        ]);
    }



    /**********************Te3 Back*********************************** */
    /**
     * @Route("/{id}", name="reclamation_show", methods={"GET"})
     */
    public function show(Reclamation $reclamation): Response
    {
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    /********************************Te3 Front*************************************** */

    /**
     * @Route("/{id}/edit", name="reclamation_editFront", methods={"GET", "POST"})
     */
    public function editF(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager,CategoriePostRepository $repo): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('reclamation_indexreclamFront', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reclamation/editFront.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),'categoryPost'=>$repo->findAll()
        ]);
    }

    /***************Traiter Reclam **********************/
    
    /**
     * @Route("/traiter/{id}",name="traiter")
     */
   
    public function traiter(int $id, ReclamationRepository $reclamationRepository, Reclamation $reclamation)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reclamation = $reclamationRepository->find($id);

        $reclamation->setEtatReclamation("Treated");
        $entityManager->flush();

        return $this->redirectToRoute('contact');
       /* return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamationRepository->find($id),
        ]);*/
     //   return $this->redirectToRoute('/');*/
    
    }

    
 
 
    /********************************* Te3 Back************************ */
    /**
     * @Route("/{id}/edit", name="reclamation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ]);
    }




    /**
     * @Route("/{id}", name="reclamation_delete", methods={"POST"})
     */
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $reclamation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reclamation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reclamation_indexreclamFront', [], Response::HTTP_SEE_OTHER);
    }
     /*****************************************JSON FINAL crud********************************************************** */

 /*******************JSON *******************/

    
    /**************Add reclam li njreb beha tawa*************** */

    /**
     * @Route("addReclamationjson", name="add_reclamationjson")
     * @Method("POST")
     */

    public function ajouterReclamationJson(Request $request, Reclamation $reclamation)
    {
        $reclamation = new Reclamation();
        $description_reclamation = $request->query->get("description_reclamation");
        $etat_reclamation = $request->query->get("etat_reclamation");
        //  $user = $request->query->get("id_user");
        $em = $this->getDoctrine()->getManager();
        $date_reclamation = new \DateTime("now");

        $reclamation->setDescriptionReclamation($description_reclamation);
        $reclamation->setEtatReclamation($etat_reclamation);
        $reclamation->setDateReclamation($date_reclamation);
        //  $reclamation->setUser($user) ;

        $em->persist($reclamation);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reclamation);
        return new JsonResponse($formatted);
    }


    /*************Modifier reclam li njreb feha ******* */
    /**
     * @Route("/updateReclamationjson", name="update_reclamationjson")
     * @Method("PUT")
     */

    public function modifierReclamationjson(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$user = $em->getRepository(User::class)->find($user);

        $reclamation = $this->getDoctrine()->getManager()
            ->getRepository(Reclamation::class)
            ->find($request->get("id"));

        //  $reclamation->setUser($user);

        $reclamation->setDescriptionReclamation($request->get("description_reclamation"));

        $em->persist($reclamation);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reclamation);
        return new JsonResponse("reclamation bien modoifie");
    }


    /************************Ajout JSON li temchiliii ************* */

    /**
     * @Route("/addReclamationJSON/new/{user}", name="addReclamationJSON")
     * @Method("POST")
     */
    public function addReclamationJSON(Request $request, NormalizerInterface $Normalizer, EntityManagerInterface $em)
    {

        $em = $this->getDoctrine()->getManager();
        $reclamation = new Reclamation();
        $date_reclamation = new \DateTime("now");
        $user = $this->getUser();

        $reclamation->setDescriptionReclamation($request->get('description_reclamation'));
        $reclamation->setEtatReclamation($request->get('etat_reclamation'));
        $reclamation->setDateReclamation($date_reclamation);
        // $id = $request->query->get("id_user");
        // $reclamation->setUser($id) ;
        $reclamation->setUser($user);
        // $reclamation->setDateReclamation($request->get('id user'));
        //  $reclamation->setDateReclamation($request->get('date_reclamation'));
        //$reclamation->setDateReclamation((\DateTime::createFromFormat('d-m-Y H:i', '28-02-2022')));
        /*  $em->persist($reclamation);
        $em->flush();
        $jsonContent = $Normalizer->normalize($reclamation, 'json', ['groups' => 'post:read']);
        return new Response(json_encode(($jsonContent)));
*/
        $em->persist($reclamation);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reclamation);
        return new JsonResponse($formatted);
    }
    /*****************************************JSON FINAL crud********************************************************** */


/***************************Print*********************************** */

    /**
     * @Route("/listreclamationjson", name="listreclamationjson")
     */
    public function listreclamationjson(ReclamationRepository $reclamationRepository, SerializerInterface $serializer): Response
    {
        $pdfOptions = new Options();
        $dompdf = new Dompdf($pdfOptions);


        $result = $reclamationRepository->findAll();

        $html = $this->renderView('reclamation/listreclamation.html.twig', [
            'reclamations' => $result,
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('mypdf.pdf', [
            "Attachment" => true
        ]);

        $json = $serializer->serialize($result, 'json', ['groups' => 'reclamation:read']);
        return new JsonResponse($json, 200, [], true);
      //  return new Response("the PDF file has benn succefully genrated");
    }

   
    /************** Ajout reclam  b id li njreb feha tawa w temchiii Finalll**************/
    /**
     * @Route("/ajoutReclamationjson/{id}", name="ajoutReclamationjson")
     */
    public function ajoutReclamationjson(Request $request, SerializerInterface $serilazer, EntityManagerInterface $em, User $id)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamation = new Reclamation();
        $date_reclamation = new \DateTime("now");
        $etat_reclamation = 'envoye';
        $user = $em->getRepository(User::class)->find($id);

        $reclamation->setUser($user);
        // $reclamation->setUser($user);
        $reclamation->setDescriptionReclamation($request->get('description_reclamation'));
        $reclamation->setEtatReclamation($etat_reclamation);
        $reclamation->setDateReclamation($date_reclamation);

        $em->persist($reclamation);
        $em->flush();

        $jsonContent = $serilazer->serialize($reclamation, 'json', ['groups' => "reclamation:read"]);
        return new Response(json_encode($jsonContent));
    }
    
    /**********affichage JSON li temchi Finall ************** */
    /**
     * @Route("/AllReclamations", name="AllReclamationss")
     */
    public function displayReclamationjson(ReclamationRepository $ReclamationRepository, SerializerInterface $serializer): Response
    {
        $result = $ReclamationRepository->findAll();
        $json = $serializer->serialize($result, 'json', ['groups' => 'reclamation:read']);
        return new JsonResponse($json, 200, [], true);
    }


    /*************Supprimer json li njreb feha w temchi c'est bon******* */

    /**
     * @Route("/deleteReclamationjson/{id}", name="delete_reclamationjson")
     * @Method("DELETE")
     */

    public function deleteReclamationJson(Request $request)
    {
        $id = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        if ($reclamation != null) {
            $em->remove($reclamation);
            $em->flush();

            $serialize = new Serializer([new ObjectNormalizer()]);
            $formatted = $serialize->normalize("Reclamation supprime avec succes");
            return new JsonResponse($formatted);
        }
        return new JsonResponse("id reclamation invalide");
    }

    /*********update reclam B USER li nnrjeb feha Finall******** */
    /**
     * @Route("/modifReclamationjson/{id}", name="modifReclamationjson")
     * @Method("PUT")
     */

    
   /* public function modifReclamationjson(Request $request,SerializerInterface $serilazer,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $reclamation = $em->getRepository(Reclamation::class)->find($id);
       $date_reclamation = new \DateTime("now");
     //   $user = $em->getRepository(User::class)->find($user);
        $etat_reservation = 'waiting for a confirmation';
       
      //  $reclamation->setUser($user);
        $reclamation->setDescriptionReclamation($request->get("description_reclamation"));
       $reclamation->setDateReclamation($date_reclamation);
    //$reclamation->setEtatReclamation($etat_reclamation);

        $em->persist($reclamation);
        $em->flush();
        $jsonContent= $serilazer->serialize($reclamation,'json',['groups'=>"reclamation:read"]);
        return new Response(json_encode($jsonContent));
    }*/



    public function modifReclamationjson(Request $request,$id)
    {
      
       $em = $this->getDoctrine()->getManager();

        $reclamation = $this->getDoctrine()->getManager();
        $reclamation = $this->getDoctrine()->getManager()
                         ->getRepository(Reclamation::class)
                         ->find($request->get("id"));

        $reclamation->setDescriptionReclamation($request->get("description_reclamation"));

        $em->persist($reclamation);
        $em->flush();

      // $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

      
        $serialize = new Serializer([new ObjectNormalizer()]);
        $formatted = $serialize->normalize("Reclamation modifie avec succes");
        return new JsonResponse($formatted);
    }
   
    

    /******************Detail reclam li temchiii Finalll***** */

    /**
     * @Route("/detailReclamationjson/{id}", name="detailReclamationjson")
     */
    public function detailReclamationjson(Request $request, SerializerInterface $serilazer, $id): Response
    {
       // $user = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
       // $user = $em->getRepository(User::class)->find($user);
        $json = $serilazer->serialize($reclamation, 'json', ['groups' => "reclamation:read"]);
        return new JsonResponse($json, 200, [], true);
    }
     /**********************Te3 Front********************************** */
    /**
     * @Route("/reclamation/{id}", name="reclamation_showFront", methods={"GET"})
     */


    public function showF(Reclamation $reclamation, ReclamationRepository $reclamationRepository,CategoriePostRepository $repo): Response
    {
        //  $reclamation = $reclamationRepository->findOneByIdUser($this->getUser()->getId(), $reclamation->getId());
        $reclamation = $reclamationRepository->findOneBy(['id' => $reclamation->getId()]);
        return $this->render('reclamation/showFront.html.twig', [
            'reclamation' => $reclamation,'categoryPost'=>$repo->findAll()
        ]);
    }

    
}
