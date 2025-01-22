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

#[Route('/', name: 'app_')]
class RegisterController extends AbstractController
{
    /////TODO : Créer la logique pour la mise en place du formulaire de création de compte 'register'
    /////TODO : intégrer lors de la soumission et la validation le hashage du mot de passe, cf méthode userPassword
    #[Route('inscription', name: 'register')]
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
            // Après avoir enregistré l'utilisateur
            $this->addFlash('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');
            // Rediriger vers la page de connexion
            return $this->redirectToRoute('app_login'); 
        }

        
        return $this->render('register/register.html.twig', [
            'formRegisterUser' => $formRegisterUser,
        ]);
    }


}
