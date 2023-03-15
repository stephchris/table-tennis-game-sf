<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Form\TournamentType;
use App\Repository\TournamentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;

#[Route('/tournament')]
class TournamentController extends AbstractController
{
    #[Route('/', name: 'app_tournament_index', methods: ['GET'])]
    public function index(TournamentRepository $tournamentRepository): Response
    {
        return $this->render('tournament/index.html.twig', [
            'tournaments' => $tournamentRepository->findAllFuture(),
        ]);
    }


    #[Route('/new', name: 'app_tournament_new', methods: ['GET', 'POST'])]

    public function new(Request $request, FileUploader $fileUploader, TournamentRepository $tournamentRepository): Response
    {
        $tournament = new Tournament();
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('image')->getData();
                if ($brochureFile) {
                    $brochureFileName = $fileUploader->upload($brochureFile);
                    $tournament->setImage($brochureFileName);
                }
            $tournamentRepository->save($tournament, true);

            return $this->redirectToRoute('app_tournament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tournament/new.html.twig', [
            'tournament' => $tournament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tournament_show', methods: ['GET'])]
    public function show(Tournament $tournament): Response
    {
        return $this->render('tournament/show.html.twig', [
            'tournament' => $tournament,
        ]);
    }

    #[Route('/{id}/participate', name: 'app_tournament_participate', methods: ['GET'])]
    public function participate(Tournament $tournament, TournamentRepository $tournamentRepository): Response
    {
        if ($tournament->hasPlayer($this->getUser())) {
            $tournament->removePlayer($this->getUser());
            $tournamentRepository->save($tournament, true);
        } else if ($tournament->getAvailablePlayerNumber() > 0) {
            $tournament->addPlayer($this->getUser());
            $tournamentRepository->save($tournament, true);
        } else {
            $this->addFlash('error', 'Il ne reste plus de place sur ce tournoi');
        }

        return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
    }

    #[Route('/{id}/edit', name: 'app_tournament_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Tournament $tournament, TournamentRepository $tournamentRepository): Response
    {
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tournamentRepository->save($tournament, true);

            return $this->redirectToRoute('app_tournament_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tournament/edit.html.twig', [
            'tournament' => $tournament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tournament_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Tournament $tournament, TournamentRepository $tournamentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tournament->getId(), $request->request->get('_token'))) {
            $tournamentRepository->remove($tournament, true);
        }

        return $this->redirectToRoute('app_tournament_index', [], Response::HTTP_SEE_OTHER);
    }




}