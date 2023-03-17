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
                'label' => 'Nom du tournoi',
                'label_attr' =>[
                    'class'=>'text'
                ],
                'attr'=>[
                    'class'=>'zone'
                ]
            ])
            ->add('dateStart', DateTimeType::class, [
                'label' => 'Date et heure',

                'label_attr' =>[
                    'class'=>'text'
                ],
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'zone'
                ]
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'label_attr' =>[
                    'class'=>'text'
                ],
                'attr'=>[
                    'class'=>'zone'
                ]
            ])
            ->add('type', TextType::class, [
                'label' => 'Genre',
                'label_attr' =>[
                'class'=>'text'
                ],
                'attr'=>[
                    'class'=>'zone'
                ]
            ])
            ->add('playerNumber', NumberType::class, [
                'label' => 'Nombre de joueurs',
                'label_attr' =>[
                'class'=>'text'
                ],
                'attr'=>[
                    'class'=>'zone'
                ]
            ])
            ->add('tableNumber', NumberType::class, [
                'label' => 'Nombre de tables',
                'label_attr' =>[
                    'class'=>'text'
                ],
                'attr'=>[
                    'class'=>'zone'
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Illustration',
                'label_attr' =>[
                    'class'=>'text'
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