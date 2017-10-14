<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class,[
                'label' => 'Votre nom',
                'attr' => array('class' => 'validate  input-field'),
            ])
            ->add('email', EmailType::class,[
                'label' => 'Votre adresse email',
                'attr' => array('class' => 'validate input-field'),
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Votre message',
                'attr' => array(
                    'class' => 'materialize-textarea validate',
                ),
            ])
            ->add('send', SubmitType::class,[
                'label' => 'Envoyer'
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
