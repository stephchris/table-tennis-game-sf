<?php

namespace App\Controller;

use App\Repository\TournamentRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class  DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(TournamentRepository $tournamentRepository, UserRepository $userRepository): Response
    {
        $tournamentsfuture = $tournamentRepository->findFuture();
        $tournamentspast = $tournamentRepository->findPast();

        return $this->render('default/index.html.twig', [
            'tournamentsf' => $tournamentsfuture,
            'tournamentsp' => $tournamentspast,
        ]);
    }

    public function maPage()
    {


        // afficher le message dans la vue
        return $this->render('ma_page.html.twig', [

        ]);
    }

}


