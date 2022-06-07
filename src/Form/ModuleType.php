<?php

namespace App\Form;

use App\Entity\Module;
use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // dd($builder->getData()->getProfesseurs());
        $builder
            ->add('nom', null, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                ],
            ])
            // ->add('professeurs', EntityType::class, [
            //     'class' => Professeur::class,
            //     'multiple' => true,
            //     'expanded' => true,
            //     'choice_label' => 'nomComplet',
            //     'label_attr' => [
            //         'class' => 'checkbox-switch',
            //     ],
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Module::class,
        ]);
    }
}
