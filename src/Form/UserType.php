<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
 ->add('email', EmailType::class, [
                'label' => 'Entrez l\'email :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('login', TextType::class, [
                'label' => 'Entrez un login :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
             ->add('name', TextType::class, [
                'label' => 'Entrez un nom :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Entrez un prénom :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('roles', ChoiceType::class,[
              'label' => 'Choisissez un ou plusieurs rôles :',
            'choices' => [ 
                'Administrateur' => 'ROLE_ADMIN',
                'hôte' => 'ROLE_HOTE',
                'vacancier' => 'ROLE_VACANCIER',
                ],
            'choice_attr' => [
                'Administrateur' => ['class'=>'me-1'],
                'hôte' => ['class'=>'ms-3 me-1'],
                'vacancier' => ['class'=>'ms-3 me-1'],
                ],
                'multiple' => true,
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('birthDate', DateType::class,[
                'label'=>'Entrez une date de naissance :',
                'widget' => 'choice',
                'years' => range(date('Y')-100,date('Y')-20),
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('address', TextareaType::class, [
                'label'=>'Entrez une adresse :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('zipcode',IntegerType::class, [
                'label'=>'Entrez un code postal :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('ville', TextType::class, [
                'label'=>'Entrez la ville :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('telephone', TextType:: class, [
                'label'=>'Entrez un numéro de téléphone :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => 'true',
                'invalid_message' => 'Les mdp ne correspondent pas',
                'first_options' => [
                    'label' => 'Entrez un mot de passe',
                    'attr' => ['class' => 'form-control']
                ],
                'second_options' => [
                    'label' => 'Retapez le mot de passe',
                    'attr' => ['class' => 'form-control']
                ],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),


        //     ->add('email')
        //     ->add('roles')
        //     ->add('password')
        //     ->add('name')
        //     ->add('firstname')
        //     ->add('login')
        //     ->add('birthDate')
        //     ->add('address')
        //     ->add('zipcode')
        //     ->add('ville')
        //     ->add('telephone')
        // ;
        new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
