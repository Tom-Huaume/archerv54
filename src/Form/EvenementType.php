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
            ->add('nom', TextType::class, [
            //'mapped' => false,
                'attr'=>[
                    'class'=>'form-control input-nom-event',
                ]
            ])

            ->add('description', TextareaType::class, [
                //'mapped' => false,
                'attr'=>[
                    'class'=>'form-control input-desc-event',
                ]
            ])

            ->add('dateHeureDebut', DateTimeType::class, [
                //'mapped' => false,
                'html5' => true,
                'widget' => 'single_text'
            ])

            ->add('dateHeureLimiteInscription', DateTimeType::class, [
                //'mapped' => false,
                'html5' => true,
                'widget' => 'single_text',

            ])

            ->add('nbInscriptionsMax', IntegerType::class, [
                //'mapped' => false,
                'attr'=>[
                    'class'=>'form-control input-inscr-event',
                ]
            ])

//            ->add('etat', TextType::class, [
//                //'mapped' => false,
//                'attr'=>[
//                    'class'=>'form-control input-etat-event',
//                ]
//            ])

            ->add('tarif', MoneyType::class, [
                //'mapped' => false,
                'attr'=>[
                    'class'=>'form-control input-prix-event',
                ]
            ])

            ->add('dateHeureCreation', DateTimeType::class, [
                //'mapped' => false,
                'html5' => true,
                'widget' => 'single_text',

            ])

            ->add('photo', FileType::class, [
                //'mapped'=>false,
                'label' => 'Photo',
                'required' => false,

            ])

            ->add('lieuDestination', EntityType::class, [
                'class' => Lieu::class,
                'choice_label' => 'nom',
                'placeholder' => '',
                'attr'=>[
                    'class'=>'form-select input-lieu-event',
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
