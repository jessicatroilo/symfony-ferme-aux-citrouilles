<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class RegisterController extends AbstractController
{
    //TODO: Créer la logique pour la mise en place du formulaire de création de compte 'register'
    //TODO: intégrer lors de la soumission et la validation le hashage du mot de passe, cf méthode userPassword
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, Security $security, EntityManagerInterface $entityManager): Response
    {
        //Création d'un nouvel utilisateur
        $user = new User();
        //Création du formulaire
        $formRegisterUser = $this->createForm(RegisterUserType::class, $user);
        //On récupère la requête
        $formRegisterUser->handleRequest($request); 

        //Si le formulaire est soumis et valide
        if ($formRegisterUser->isSubmitted() && $formRegisterUser->isValid()) {
            //On récupère les données du formulaire
            $user = $formRegisterUser->getData();
            //On hash le mot de passe
            $hashedPassword = $userPasswordHasher->hashPassword($user, $formRegisterUser->get('password')->getData());
            //On set le mot de passe hashé
            $user->setPassword($hashedPassword);
            //On set les rôles
            $user->setRoles(['ROLE_USER']);
            //On set la date de création
            $user->setCreatedAt(new \DateTimeImmutable());
            //On set la date de mise à jour
            $user->setUpdatedAt(new \DateTimeImmutable());
            //On persiste l'utilisateur
            $entityManager->persist($user);
            //On flush
            $entityManager->flush();
            //On redirige vers la page de connexion
            return $this->redirectToRoute('app_home'); //TODO: à modifier quand par 'app_login' quand la page sera créée
        }

        return $this->render('register/register.html.twig', [
            'formRegisterUser' => $formRegisterUser,
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
