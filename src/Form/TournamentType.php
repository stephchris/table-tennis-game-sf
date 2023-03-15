<?php

namespace App\Form;

use App\Entity\Tournament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\File;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du tournoi'
            ])
            ->add('dateStart', DateTimeType::class, [
                'label' => 'Date et heure',
                'widget' => 'single_text'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('type', TextType::class, [
                'label' => 'Genre'
            ])
            ->add('playerNumber', NumberType::class, [
                'label' => 'Nombre de joueurs'
            ])
            ->add('tableNumber', NumberType::class, [
                'label' => 'Nombre de tables'
            ])
            ->add('image', FileType::class, [
                'label' => 'Illustration',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/gif',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournament::class,
        ]);
    }
}