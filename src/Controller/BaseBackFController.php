<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseBackFController extends AbstractController
{
    /**
     * @Route("/base/back/f", name="base_back_f")
     */
    public function index(): Response
    {
        return $this->render('base_back_f/basebackF.html.twig', [
            'controller_name' => 'BaseBackFController',
        ]);
    }
}
