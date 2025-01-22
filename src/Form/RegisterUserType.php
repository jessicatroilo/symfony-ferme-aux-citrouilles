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
                'label' => 'Adresse email *',
                'required' => true,
                'label_attr' => [
                    'class' => 'form-label',
                    'aria-label' => 'Adresse email (champ obligatoire)',
                ],
                'attr' => [
                    'class' => 'form-input'
                ]
            ])

            ->add('lastname', TextType::class, [
                "label" => "Nom *",
                'required' => true,
                'label_attr' => [
                    'class' => 'form-label', 
                    'aria-label' => 'Nom (champ obligatoire)',
                ],
                'attr'=> [
                    'class' => 'form-input'
                ] 
            ])

            ->add('firstname', TextType::class, [
                "label" => "Prénom *",  
                'required' => true,
                'label_attr'=> [
                    'class' => 'form-label',
                    'aria-label'=> 'Prénom (champ obligatoire)',
                ],
                'attr' => [
                    'class' => 'form-input'
                ]               
            ])

            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo *',
                'required' => true,
                'label_attr' => [
                    'class' => 'form-label',
                    'aria-label' => 'Pseudo (champ obligatoire)',
                ],
                'attr' => [
                    'class' => 'form-input'
                ]
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'options' => [
                    'attr' => [
                        'autocomplete' => 'new-password', //permet de ne pas afficher les mots de passe enregistrés
                    ],
                ],                            
                'required' => true,
                'first_options'  => [
                    'label' => 'Mot de passe *',
                    'help' => 'Votre mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.',
                    'help_attr' => [ 'class' => 'mt-1 text-sm text-pearl' ],
                    'label_attr' => [
                        'class' => 'form-label',
                        'aria-label' => 'Mot de passe (champ obligatoire)',
                    ],
                    'attr'=> [ 
                    'class' => 'form-input'
                    ],          
                ],
                'second_options' => [
                    'label' => 'Répéter le mot de passe *',
                    'label_attr' => [
                        'class' => 'form-label',
                        'aria-label' => 'Répéter le mot de passe (champ obligatoire)',
                    ],
                    'attr'=> [ 
                    'class' => 'form-input'
                    ],          
                ],
            ])
            
            ->add('submit', SubmitType::class, [
                'label' => 'Créer le compte',
                'attr' => [
                    'class' => 'form-btn',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_token' => true,
            
        ]);
    }
}
