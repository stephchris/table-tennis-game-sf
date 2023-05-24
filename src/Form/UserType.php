<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
                'required' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
                'required' => true,
            ])
            ->add('gender', TextType::class, [
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
                'required' => true,
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'Date de naissance',
                'label_attr' => [
                    'class' => 'text'
                ],
                'widget' => 'single_text',


            ])
            ->add('address', TextType::class, [
                'label' => 'Rue',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Code postal',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
            ])
            ->add('ranking', TextType::class, [
                'label' => 'Classement',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
                'required' => true,
            ])
            ->add('image', FileType::class, [
                'label' => 'Photo de profil',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => ['accept' => 'image/*'],
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
                        ]
                        ,
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ])
                ]])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'text'
                ],
                'attr' => [
                    'class' => 'zone'
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe', 'hash_property_path' => 'password'],
                'second_options' => ['label' => 'Confirmer le mot de passe',
                    'attr' => [
                        'class' => 'zone'
                    ],
                ],
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'text'
                ],

                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
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
