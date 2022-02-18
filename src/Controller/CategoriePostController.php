<?php

namespace App\Controller;

use App\Entity\CategoriePost;
use App\Form\CategoriePostType;
use App\Repository\CategoriePostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/categorie/post")
 */
class CategoriePostController extends AbstractController
{
    /**
     * @Route("/", name="categorie_post_index", methods={"GET"})
     */
    public function index(CategoriePostRepository $categoriePostRepository): Response
    {
        return $this->render('categorie_post/index.html.twig', [
            'categorie_posts' => $categoriePostRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorie_post_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,ValidatorInterface $validator): Response
    {
        $categoriePost = new CategoriePost();
        $form = $this->createForm(CategoriePostType::class, $categoriePost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validator->validate($categoriePost);
            if (count($errors) > 0) {
                $errorsString = (string) $errors;
        
                return new Response($errorsString);
            }
            $entityManager->persist($categoriePost);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_post/new.html.twig', [
            'categorie_post' => $categoriePost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_post_show", methods={"GET"})
     */
    public function show(CategoriePost $categoriePost): Response
    {
        return $this->render('categorie_post/show.html.twig', [
            'categorie_post' => $categoriePost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorie_post_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CategoriePost $categoriePost, EntityManagerInterface $entityManager,ValidatorInterface $validator): Response
    {
        $form = $this->createForm(CategoriePostType::class, $categoriePost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validator->validate($categoriePost);
            if (count($errors) > 0) {
                $errorsString = (string) $errors;
        
                return new Response($errorsString);
            }
            $entityManager->flush();

            return $this->redirectToRoute('categorie_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_post/edit.html.twig', [
            'categorie_post' => $categoriePost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_post_delete", methods={"POST"})
     */
    public function delete(Request $request, CategoriePost $categoriePost, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoriePost->getId(), $request->request->get('_token'))) {
            $entityManager->remove($categoriePost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorie_post_index', [], Response::HTTP_SEE_OTHER);
    }
}
