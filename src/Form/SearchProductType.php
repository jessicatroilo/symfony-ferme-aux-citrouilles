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
        'label' => 'Produit(s) par page : ',
        'attr' => [
            'class' => 'p-1'
        ],
        'data' => $_GET['productsPerPage'] ?? 5 // Valeur par défaut - en récupérant la valeur de la query string via $_GET et ?? pour la valeur par défaut si la query string n'existe pas
        
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Afficher',
            'attr' => ['class' => 'flex self-stretch lg:self-start justify-center mt-1 lg:text-lg text-m font-bold bg-leaf text-pearl p-2 rounded-lg hover:ring-2 ring-pumpkin hover:bg-farm-blue'
            ]
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
