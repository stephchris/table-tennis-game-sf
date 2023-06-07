<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
                'required' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
                'required' => true,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'placeholder' => 'Sélectionner un genre',
                'choices' => [
                    'Femme' => 'femme',
                    'Homme' => 'homme',
                    'Mixte' => 'mixte',
                ],

                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
                'required' => true,
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'Date de naissance',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'zone mt-1 mb-4 text-blue custom-form'
                ]

            ])
            ->add('address', TextType::class, [
                'label' => 'N° et rue',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Code postal',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
            ])
            ->add('ranking', TextType::class, [
                'label' => 'Classement',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
                ],
                'required' => true,
            ])
            ->add('image', FileType::class, [
                'label' => 'Photo de profil',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4'
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
                        ]
                        ,
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ])
                ]])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],
                'attr' => [
                    'class' => 'zone mt-1 mb-4 text-blue'
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe', 'hash_property_path' => 'password',
                    'attr' => [
                        'class' => 'zone mt-1 mb-4 text-blue'
                    ],
                    'label_attr' => [
                        'class' => 'block text font-bold'
                    ],
                ],
                'second_options' => ['label' => 'Confirmer le mot de passe',
                    'attr' => [
                        'class' => 'zone mt-1 mb-4'
                    ],
                    'label_attr' => [
                        'class' => 'block text font-bold'
                    ],
                ],
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'block text font-bold'
                ],

                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',
                    'class' => 'zone mt-1 mb-4'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],

            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'J\'accepte les conditions d\'utilisation',
                'label_attr' => [
                    'class' => 'font-bold ml-2'
                ],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Veuillez accepter les conditions',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
