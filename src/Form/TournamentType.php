<?php

namespace App\Form;

use App\Entity\Tournament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\File;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $choices = [];
        for ($i = 1; $i <= 100; $i++) {
            $choices[$i] = $i;
        }
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du tournoi',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ]
            ])
            ->add('dateStart', DateTimeType::class, [
                'label' => 'Date et heure',

                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'zone mt-1 mb-4 text-blue'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ]
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'placeholder' => 'Sélectionner un genre',
                'choices'  => [
                    'Femme' => 'femme',
                    'Homme' => 'homme',
                    'Mixte' => 'mixte',
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4 text-blue'
                ]
            ])


            ->add('playerNumber', ChoiceType::class,array (
                'label' => 'Nombre de joueurs',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
                'choices' => $choices

            ))


            ->add('tableNumber', ChoiceType::class, array(
                'label' => 'Nombre de tables',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
                'choices' => $choices
            ))
            ->add('image', FileType::class, [
                'label' => 'Illustration',
                'label_attr' => [
                    'class' => 'text font-bold'
                ],

                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1500k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/gif',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image',

                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournament::class,
        ]);
    }
}