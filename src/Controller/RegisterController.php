<?php

namespace App\Controller;

use App\Form\RegisterUserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    //TODO: Créer la logique pour la mise en place du formulaire de création de compte 'register'
    //TODO: intégrer lors de la soumission et la validation le hashage du mot de passe, cf méthode userPassword
    #[Route('/creation_de_compte', name: 'app_front_register')]
    public function index(Request $request): Response
    {
        //Création du formulaire
        $formRegisterUser = $this->createForm(RegisterUserType::class);
        //On récupère la requête
        $formRegisterUser->handleRequest($request); 

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'formRegisterUser' => $formRegisterUser->createView()
        ]);
    }


    /**
     * A récupérer lors de la construction du controler pour valider le formulaire
     *
     * @param UserPasswordHasherInterface $passwordHasher
     * @return Response
     */
    /*public function userPassword(UserPasswordHasherInterface $passwordHasher): Response
    {
        // ... e.g. get the user data from a registration form
        $user = new User(...);
        $plaintextPassword = ...;

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);

        // ...
    } */
}
