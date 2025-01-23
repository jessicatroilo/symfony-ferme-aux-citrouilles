<?php

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    
    
    /**
     * Méthode qui affiche le formulaire de connexion
     *
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    #[Route('/connexion', name: 'app_login')]
    public function logIn(AuthenticationUtils $authenticationUtils, Request $request): Response
    {

        // recupère l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // dernier nom d'utilisateur saisi (si il y en a un)
        $lastUsername = $authenticationUtils->getLastUsername();


         // Si l'utilisateur est déjà connecté, on le redirige
        //if ($this->getUser()) {
           // return $this->redirectToRoute('app_home');
       // }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }


    

    /**
     * Method to show the logout page
     *
     * @return void
     */
    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(): Response
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
