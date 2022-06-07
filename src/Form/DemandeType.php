<?php

namespace App\Form;

use App\Entity\Demande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('motif', null, [
                'label' => 'Motif de la demande',
                'attr' => [
                    'placeholder' => 'Motif de la demande',
                ],
            ])
            ->add('date', null, [
                'label' => 'Date de la demande',
                'attr' => [
                    'placeholder' => 'Date de la demande',
                    
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
