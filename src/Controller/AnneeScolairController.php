<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnneeScolairController extends AbstractController
{
    #[Route('/annee/scolair', name: 'app_annee_scolair')]
    public function index(): Response
    {
        return $this->render('annee_scolair/index.html.twig', [
            'controller_name' => 'AnneeScolairController',
        ]);
    }
}
