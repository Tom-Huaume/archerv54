<?php

namespace App\Form;

use App\Entity\Lieu;
use App\Entity\Trajet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrajetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Titre',
                'attr'=>[
                    'class'=>'form-control font-input',
                ]

            ])
//            ->add('description')
//            ->add('dateHeureDepart')
//            ->add('nbPlaces')
//            ->add('typeVoiture')
//            ->add('couleurVoiture')

            ->add('lieuDepart', EntityType::class, [
                'mapped' => false,
                'required' => false,
                'class' => Lieu::class,
                'label' => 'Lieu de départ',
                'choice_label' => 'nom',
                'placeholder' => '',
                'attr'=>[
                    'class'=>'form-select font-input input-lieu-event',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trajet::class,
        ]);
    }
}
