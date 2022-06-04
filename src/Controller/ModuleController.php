<?php

namespace App\Controller;

use App\Repository\ModuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModuleController extends AbstractController
{
    #[Route('/module', name: 'app_module')]
    public function index(ModuleRepository $repo): Response
    {
        $modules = $repo->findAll();
        // dd($modules);
        $titre = "Liste des Modules";
       
        return $this->render('module/index.html.twig', [
            'controller_name' => 'ModuleController',
            'modules' => $modules,
            'titre' => $titre,
        ]);
       
    }
}
