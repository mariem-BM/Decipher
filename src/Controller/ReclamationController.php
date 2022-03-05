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
use Swift_Mailer;


use Symfony\Flex\Unpack\Result;

/**
 * @Route("/reclamation")
 */
class ReclamationController extends AbstractController
{
    /**
     * @Route("/", name="reclamation_index", methods={"GET"})
     */
    public function index(ReclamationRepository $reclamationRepository): Response
    {
        

        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamationRepository->findAll(),
        ]);
    }

    /********* **************** Index Front*********** ***************/

    /**
     * @Route("/reclamation_indexreclamFront", name="reclamation_indexreclamFront", methods={"GET"})
     */
    public function indexF(ReclamationRepository $reclamationRepository): Response
    {
        return $this->render('reclamation/indexreclamFront.html.twig', [
            'reclamations' => $reclamationRepository->findAll(),
        ]);
    }



    //Tri par date

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
    /**************************ADD Back************************************ */

    /**
     * @Route("/new", name="reclamation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
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
            'form' => $form->createView(),
        ]);
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

    /************************Ajout JSON************* */

    /**
     * @Route("/addReclamationJSON/new", name="addReclamationJSON")
     */
    public function addReclamationJSON(Request $request, NormalizerInterface $Normalizer, EntityManagerInterface $em)
    {

        $em = $this->getDoctrine()->getManager();
        $reclamation = new Reclamation();
        $reclamation->setDescriptionReclamation($request->get('description_reclamation'));
        //$reclamation->setDateReclamation($request->get('date_reclamation'));
        $reclamation->setDateReclamation((\DateTime::createFromFormat('d-m-Y H:i', '28-02-2022')));
        $em->persist($reclamation);
        $em->flush();
        $jsonContent = $Normalizer->normalize($reclamation, 'json', ['groups' => 'post:read']);
        return new Response(json_encode(($jsonContent)));
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




    /**********************Te3 Front********************************** */
    /**
     * @Route("/reclamation/{id}", name="reclamation_showFront", methods={"GET"})
     */
    

    public function showF(Reclamation $reclamation,ReclamationRepository $reclamationRepository): Response
    {
      //  $reclamation = $reclamationRepository->findOneByIdUser($this->getUser()->getId(), $reclamation->getId());
        $reclamation = $reclamationRepository->findOneBy(['id' => $reclamation->getId()]);
        return $this->render('reclamation/showFront.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }
   
   /* public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('mariembenmassoud123@gmail.com')
            ->to('mariembenmassoud123@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);

        return $this->render('emmails/index.html.twig');
    }*/

     /* public function contact(Request $request, \Swift_Mailer $mailer) {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
        $contact = $form->getData();
        //envoi de maill
        $message = (new \Swift_Message('Nouveau contact'))
        // On attribue l'expéditeur
        ->setFrom($contact['email'])
        // On attribue le destinataire
        ->setTo('maryem.benmassoud@esprit.tn')
        // On crée le texte avec la vue
        ->setBody(
            $this->renderView(
                'emails/contact.html.twig', compact('contact')
            ),
            'text/html'
        )
    ;
    $mailer->send($message);

    $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi

return $this->render('emmails/index.html.twig',['contactForm' => $form->createView()]);
}*/



    
     /*   return $this->render('reclamation/contact.html.twig', [
            'contactForm' => $form->createView()
        ]);
    
        }
    }*/


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
    public function editF(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('reclamation_indexreclamFront', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reclamation/editFront.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),
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

        return $this->redirectToRoute('reclamation_index');
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
}
