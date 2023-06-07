<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        //récupérer  le dernier email saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        if ($error) {
            // Ajouter un message flash d'erreur
            $this->addFlash('error', 'Identifiants invalides.');
        }

        return $this->render('login/index.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,

        ]);

}


}
