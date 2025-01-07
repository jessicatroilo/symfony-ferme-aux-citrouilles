<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Adresse email'
            ])

            ->add('lastname', TextType::class, [
                "label" => "Nom",
            ])

            ->add('firstname', TextType::class, [
                "label" => "Prénom",
            ])

            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo'
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'options' => [
                    'attr' => [
                        'class' => 'password-field', // TODO: à modifier selon la mise en forme
                        'autocomplete' => 'new-password' //permet de ne pas afficher les mots de passe enregistrés
                        ]
                ],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Répéter le mot de passe'],
            ])
            
            ->add('submit', SubmitType::class, [
                'label' => 'Créer le compte',
                'attr' => ['class' => 'flex self-stretch lg:self-start justify-center mt-1 lg:text-lg text-m font-bold bg-leaf text-pearl p-2 rounded-lg hover:ring-2 ring-pumpkin hover:bg-farm-blue'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            
        ]);
    }
}
