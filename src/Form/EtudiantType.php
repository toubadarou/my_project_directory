<?php

namespace App\Form;

use App\Entity\Etudiant;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // dd($builder->getData()->getProfesseurs());
        $builder
            ->add('nomComplet',null, [
                'label' => 'Nom complet',
                'attr' => [
                    'placeholder' => 'Nom complet',
                ],
            ])
            // ->add('email', EmailType::class, [
            //     'label' => 'Email',
            //     'attr' => [
            //         'placeholder' => 'Email',
            //     ],
            // ])
            
            // ->add('password', PasswordType::class, [
            //     'label' => 'Mot de passe',
            //     'attr' => [
            //         'type' => 'password',
            //         'placeholder' => 'Mot de passe',
            //     ],
            // ])
            // ->add('matricule', null, [
            //     'label' => 'Matricule',
            //     'attr' => [
            //         'placeholder' => 'Matricule',
            //     ],
            // ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Masculin' => 'M',
                    'Feminin' => 'F',
                ],
                'label' => 'Sexe',
                'attr' => [
                    'placeholder' => 'Sexe',
                ],
            ])
            ->add('adresse', null, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Adresse',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
