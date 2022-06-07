<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', null, [
                'label' => 'Libelle',
                'attr' => [
                    'placeholder' => 'Libelle',
                ],
            ])
            ->add('filiere', null, [
                'label' => 'Filiere',
                'attr' => [
                    'placeholder' => 'Filiere',
                ],
            ])
            ->add('niveau', null, [
                'label' => 'Niveau',
                'attr' => [
                    'placeholder' => 'Niveau',
                ],
            ]);
            // ->add('professeurs', EntityType::class, [
            //     'class' => Professeur::class,
            //     'multiple' => true,
            //     'expanded' => true,
            //     'choice_label' => 'nomComplet',
            //     'label_attr' => [
            //         'class' => 'checkbox-switch',
            //     ],
            // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
