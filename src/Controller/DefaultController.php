<?php

namespace App\Controller;

use App\Repository\TournamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class  DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(TournamentRepository $tournamentRepository ): Response
    {
        $tournaments = $tournamentRepository->findFuture();

        return $this->render('default/index.html.twig', [
            'tournaments' => $tournaments
        ]);
    }
}
