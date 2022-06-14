<?php

namespace App\Form;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Form\EtudiantType;
use App\Entity\Inscription;
use App\Entity\AnneeScolaire;
use App\Form\AnneeScolaireType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('date')
            ->add('etudiant', EtudiantType::class, [
                'label' => 'Etudiant',
                'required' => true,
            ])
            ->add('classe',EntityType::class, [
                'class' => Classe::class,
                // 'multiple' => true,
                // 'expanded' => true,
                'choice_label' => 'libelle',
                
            ])
            // ->add('annneeScolaire',EntityType::class, [
            //     'class' => AnneeScolaire::class,
            //     // 'multiple' => true,
            //     // 'expanded' => true,
            //     'choice_label' => 'libelle',
                
            // ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
