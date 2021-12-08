<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Lieu;
use App\Repository\LieuRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lieuDestination', EntityType::class, [
                'mapped' => false,
                'class' => Lieu::class,
                'label' => 'Lieu de l\'évènement',
                'choice_label' => 'nom',
                'placeholder' => '',
                'attr'=>[
                    'class'=>'form-select font-input input-lieu-event',
                ]
            ])

            ->add('nom', TextType::class, [
                'mapped' => false,
                'label' => 'Quel titre voulez vous donner à votre évènement ?',
                'attr'=>[
                    'class'=>'form-control font-input',
                ]
            ])

            ->add('description', TextareaType::class, [
                'mapped' => false,
                'label' => 'Décrivez votre évènement',
                'attr'=>[
                    'class'=>'form-control font-input-little',
                    'placeholder'=>'(Facultatif)',
                ]
            ])

            ->add('dateHeureDebut', DateTimeType::class, [
                'mapped' => false,
                'label' => 'Date et heure de début de l\'évènement',
                'html5' => true,
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'font-input',
                ]
            ])

            ->add('dateHeureLimiteInscription', DateTimeType::class, [
                'mapped' => false,
                'html5' => true,
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'font-input',
                ]
            ])

            ->add('nbInscriptionsMax', IntegerType::class, [
                'mapped' => false,
                'label' => 'Nombre de places disponibles (facultatif)',
                'attr'=>[
                    'class'=>'form-control input-inscr-event',
                ]
            ])

            ->add('tarif', TextType::class, [
                'mapped' => false,
                'label' => 'Voulez-vous indiquer un prix ?',
                'attr'=>[
                    'class'=>'form-control font-input input-prix-event',
                    'placeholder'=>'(Facultatif)',
                ]
            ])

            ->add('photo', FileType::class, [
                'mapped'=>false,
                'label' => 'Souhaitez-vous ajouter une photo ?',
                'required' => false,
                'attr'=>[
                    'class'=>'form-control font-input',
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
