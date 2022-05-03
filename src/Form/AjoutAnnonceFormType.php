<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Regions;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AjoutAnnonceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('User', HiddenType:: class)
            ->add('Title', HiidenType::class)
            ->add('Description')
            ->add('Price')
            ->add('City')
            ->add('images', FileType::class,[
                'label'=> false,
                'multiple'=> true,
                'mapped'=> false,
                'required'=> false
            ])
            ->add('city',EntityType::class,[
                'mapped'=>false,
                'class'=> City::class,
                'choise_label'=> 'City',
                'placeholder'=>'City',
            ])
            ->add('Valider', SubmitType::class)
        ;
    }
            

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
  
    }
}