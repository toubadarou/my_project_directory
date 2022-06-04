<?php

namespace App\Controller;

use App\Repository\InscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(InscriptionRepository $repo): Response
    {
        dd($repo->findAll());
        $inscriptions = $repo->findAll();
        dd($inscriptions);
        $titre = "Liste des Inscriptions";
        
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
            'demandes' => $inscriptions,
            'titre' => $titre,
        ]);

       
    }
}
