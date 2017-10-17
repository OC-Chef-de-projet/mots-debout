<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_email', EmailType::class,
                [
                    'attr' => [
                        'label' => 'Adresse email',
                        'class' => 'validate  input-field',
                    ],
                ]
            )
            ->add('_password', PasswordType::class,
                [
                    'attr' => [
                        'label' => 'Mot de passe',
                        'class' => 'validate  input-field',
                    ],
                ]
            )
            ->add('save', SubmitType::class,
                [
                    'label' => 'Connexion',
                ]
            )
            ->add('_remember_me', CheckboxType::class,
                [
                    'data'  => true,
                    'label' => 'Se souvenir de moi',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
