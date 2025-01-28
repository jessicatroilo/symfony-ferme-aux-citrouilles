<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
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
    public function contact(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {

        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contact->setCreatedAt();

            // Save the contact in the database
            $entityManager->persist($contact);
            $entityManager->flush();


            // TODO - à faire fonctionner - Send an email to the admin
            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('jessica.troilo25@gmail.com') 
                ->subject($contact->getSubject())
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'contact' => $contact,
                ]);
                ;
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('/contact/contact.html.twig', [
            'formContact' => $form->createView(),
        ]);
    }
}
