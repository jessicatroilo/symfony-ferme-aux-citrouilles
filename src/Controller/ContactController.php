<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * Method to show the contact page
     *
     * @param Request $request
     * @param Contact $contact
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    #[Route('/contact', name: 'app_front_contact', methods: ['GET', 'POST'])]
    public function contact(Request $request, Contact $contact, EntityManagerInterface $entityManager, MailerInterface $mailer ): Response
    {
        // création d'une nouvelle instance de l'entité Contact
        $contact = new Contact(); 

        //donnée de test // TODO à supprimer 
        $contact->setFirstname('Jessica');
        $contact->setLastname('Troilo');
        $contact->setEmail('jessica.troilo@yahoo.fr');
        $contact->setSubject('Test');
        $contact->setMessage('Ceci est un message de test');

        // Création du formulaire
        $form = $this->createForm(ContactType::class, $contact); 

        // récupération des données du formulaire
        $form->handleRequest($request); 

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            $contact->setCreatedAt(); // ajout de la date de création en BDD

            // Save the contact in the database if you have database
            $entityManager->persist($contact);
            $entityManager->flush();


             // Gestion des erreurs
            try {    
                $email = (new TemplatedEmail()) // contient les mêmes méthodes que Email() avec la possibilité de passer un template twig
                    ->from($contact->getEmail())
                    ->to('jessica.troilo25@gmail.com') 
                    ->subject($contact->getSubject())
                    ->text($contact->getMessage())
                    ->htmlTemplate('emails/contact.html.twig') // template twig
                    ->context([
                        'contact' => $contact,
                    ]); // données à passer au template twig
        
                $mailer->send($email);

                // Message de confirmation
                $this->addFlash('success-contact', 'Votre message a bien été envoyé');

                // Redirection vers la page de contact
                return $this->redirectToRoute('app_front_contact');
            } catch (\Exception $e) {
                $this->addFlash('error-contact', 'Une erreur est survenue lors de l\'envoi du message');
            }  

        }

        return $this->render('/contact/contact.html.twig', [
            'formContact' => $form->createView(),
        ]);
    }
}
