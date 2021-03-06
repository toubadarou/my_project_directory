<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Cache\ArrayResult;
use Doctrine\DBAL\Types\ArrayType;
use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
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
            ->add('email')
            ->add('password');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
