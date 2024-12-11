<?php 

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SearchProductType extends AbstractType
{

    // Ajoutez une dépendance pour le générateur d'URL si nécessaire
    public function __construct(private UrlGeneratorInterface $urlGenerator) 
    {
        
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->setAction($this->urlGenerator->generate('app_front_product_list', $_GET)) // Conserve les paramètres GET existants
        ->add('productToShow', ChoiceType::class, [
        'choices'  => [
            '1' => 1,
            '5' => 5,
            '10' => 10,
            '50' => 50
        ],
        'label' => false,
        
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Afficher',
        ]);
    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
