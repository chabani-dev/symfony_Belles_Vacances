<?php

namespace App\Form;

use App\Entity\Resevation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Resevation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('amount')
            ->add('comment')
            ->add('picture')
            ->add('reservationNumber')
            ->add('dateRervation')
            ->add('users')
            ->add('annonces')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resevation::class,
        ]);
    }
}
