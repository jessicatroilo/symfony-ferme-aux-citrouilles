<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\NotBlank;
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
                "label" => "Prénom *",  
                'label_attr'=> [
                    'class' => 'font-bold text-lg text-pearl',
                    'aria-label'=> 'Prénom (champ obligatoire)',
                ],
                'attr' => [
                    'class' => 'text-lg text-farm-blue font-bold w-full outline-farm-blue border-2 rounded']               
            ])

            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo'
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'options' => [
                    'attr' => [
                        'autocomplete' => 'new-password' //permet de ne pas afficher les mots de passe enregistrés
                    ],
                ],
                'required' => true,
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'help' => 'Votre mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.',
                    'help_attr' => [ 'class' => 'mt-1 text-sm text-pearl' ]
                ],
                'second_options' => [
                    'label' => 'Répéter le mot de passe',
                ],
            ])
            
            ->add('submit', SubmitType::class, [
                'label' => 'Créer le compte',
                'attr' => ['class' => 'flex self-stretch lg:self-start justify-center mx-2 lg:mx-0 mt-4 lg:text-lg text-m font-bold bg-pumpkin-btn text-pearl p-2 rounded-lg hover:ring-2 ring-pumpkin hover:bg-farm-blue'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csfr_token' => true,
            
        ]);
    }
}
