<?php

namespace App\Controller;

use App\Repository\ProfesseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfesseurController extends AbstractController
{
    #[Route('/professeur', name: 'app_professeur')]
    public function index(ProfesseurRepository $repo): Response
    {
        $professeurs = $repo->findAll();
        dd($professeurs);
        $titre = "Liste des Professurs";

        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
            'demandes' => $professeurs,
            'titre' => $titre,
        ]);
      
    }
}
