<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Adresse email *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'Entrez votre adresse email',
                    'aria-label' => 'Adresse email de connexion (champ obligatoire)'
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'Entrez votre mot de passe',
                    'aria-label' => 'Mot de passe de connexion (champ obligatoire)'
                ],
            ])
            ->add('_remember_me', CheckboxType::class, [
                'label' => 'Se souvenir de moi',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => false,
                'attr' => [
                    'class' => 'form-checkbox', 
                    'aria-label' => 'Se souvenir de ma connexion'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Se connecter',
                'attr' => [
                    'class' => 'form-btn',
                ]
                ]);
            
            

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
        
    }
}