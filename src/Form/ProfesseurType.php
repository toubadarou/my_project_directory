<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProfesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomComplet', null, [
                'label' => 'Nom complet',
                'attr' => [
                    'placeholder' => 'Nom complet',
                ],
            ])
            ->add('grade', ChoiceType::class, [
                'choices' => [
                    'Docteur' => 'Docteur',
                    'Ingénieur' => 'Ingénieur',
                    'Master' => 'Master',
                    'Stagiaire' => 'Stagiaire',
                    'Spécialiste' => 'Spécialiste',

                ],
                'label' => 'Grade',
                'attr' => [
                    'placeholder' => 'Grade',
                    'require' => true

                ],
            ])
            ->add('classes', EntityType::class, [
                'class' => Classe::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'libelle',
                'label_attr' => [
                    'class' => 'checkbox-switch',
                ],
            ])
            ->add('modules', EntityType::class, [
                'class' => Module::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'nom',
                'label_attr' => [
                    'class' => 'checkbox-switch',
                ],
            ])
          
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}
