<?php

namespace App\Controller;

use App\Entity\RP;
use App\Form\RPType;
use App\Repository\RPRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/r/p')]
class RPController extends AbstractController
{
    #[Route('/', name: 'app_r_p_index', methods: ['GET'])]
    public function index(RPRepository $rPRepository): Response
    {
        return $this->render('rp/index.html.twig', [
            'r_ps' => $rPRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_r_p_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RPRepository $rPRepository): Response
    {
        $rP = new RP();
        $form = $this->createForm(RPType::class, $rP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rPRepository->add($rP, true);

            return $this->redirectToRoute('app_r_p_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rp/new.html.twig', [
            'r_p' => $rP,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_r_p_show', methods: ['GET'])]
    public function show(RP $rP): Response
    {
        return $this->render('rp/show.html.twig', [
            'r_p' => $rP,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_r_p_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RP $rP, RPRepository $rPRepository): Response
    {
        $form = $this->createForm(RPType::class, $rP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rPRepository->add($rP, true);

            return $this->redirectToRoute('app_r_p_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rp/edit.html.twig', [
            'r_p' => $rP,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_r_p_delete', methods: ['POST'])]
    public function delete(Request $request, RP $rP, RPRepository $rPRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rP->getId(), $request->request->get('_token'))) {
            $rPRepository->remove($rP, true);
        }

        return $this->redirectToRoute('app_r_p_index', [], Response::HTTP_SEE_OTHER);
    }
}
