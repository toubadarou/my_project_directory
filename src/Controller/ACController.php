<?php

namespace App\Controller;

use App\Entity\AC;
use App\Form\ACType;
use App\Repository\ACRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/a/c')]
class ACController extends AbstractController
{
    #[Route('/', name: 'app_a_c_index', methods: ['GET'])]
    public function index(ACRepository $aCRepository): Response
    {
        return $this->render('ac/index.html.twig', [
            'a_cs' => $aCRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_a_c_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ACRepository $aCRepository): Response
    {
        $aC = new AC();
        $form = $this->createForm(ACType::class, $aC);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $aCRepository->add($aC, true);

            return $this->redirectToRoute('app_a_c_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ac/new.html.twig', [
            'a_c' => $aC,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_a_c_show', methods: ['GET'])]
    public function show(AC $aC): Response
    {
        return $this->render('ac/show.html.twig', [
            'a_c' => $aC,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_a_c_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AC $aC, ACRepository $aCRepository): Response
    {
        $form = $this->createForm(ACType::class, $aC);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $aCRepository->add($aC, true);

            return $this->redirectToRoute('app_a_c_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ac/edit.html.twig', [
            'a_c' => $aC,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_a_c_delete', methods: ['POST'])]
    public function delete(Request $request, AC $aC, ACRepository $aCRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aC->getId(), $request->request->get('_token'))) {
            $aCRepository->remove($aC, true);
        }

        return $this->redirectToRoute('app_a_c_index', [], Response::HTTP_SEE_OTHER);
    }
}
