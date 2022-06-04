<?php

namespace App\Controller;

use App\Repository\AnneeScolaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnneeScolairController extends AbstractController
{
    #[Route('/annee/scolair', name: 'app_annee_scolair')]
    public function index(AnneeScolaireRepository $repo): Response
    {
        $annees = $repo->findAll();
        dd($annees);
        $titre = "Liste des Années Scolaires";
        return $this->render('annee_scolair/index.html.twig', [
            'controller_name' => 'AnneeScolairController',
            'annees' => $annees,
            'titre' => $titre,
        ]);
    }
}
