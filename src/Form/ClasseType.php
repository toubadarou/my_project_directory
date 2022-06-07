<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('filiere',ChoiceType::class, [
                'choices' => Classe::$filieres,
                'label' => 'filiere',
                'required' => false,
            ])
           ->add('niveau', ChoiceType::class, [
                'choices' => Classe::$niveaux,
                'label' => 'Niveau',
                'required' => false,
            ]);
            // ->add('professeurs', EntityType::class, [
            //     'class' => Professeur::class,
            //     'multiple' => true,
            //     'expanded' => true
                
            // ]);
               
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
