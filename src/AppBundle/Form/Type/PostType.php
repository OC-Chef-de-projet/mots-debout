<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Post;
<<<<<<< HEAD
=======

>>>>>>> 748febc9e6dca0cdcb78e4fd6fe1ce78f0707e93

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('content', TextareaType::class,
                [
                    'label' => 'Article',
                    'attr' => [
                        'class' => 'tinymce',
                        'data-theme' => 'bbcode'
                    ]
                ]
            )
            ->add('status',ChoiceType::class,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
<<<<<<< HEAD
                    'choices' =>
                    [
                        'Publié' => Post::PUBLISHED,
                        'Brouillon' => Post::DRAFT,
                        'A valider' => Post::TOBEVALIDATED
                    ],
                    'multiple' => false
=======
                    'choices' => $options['status']
>>>>>>> 748febc9e6dca0cdcb78e4fd6fe1ce78f0707e93


                ]
            )
            ->add('category',EntityType::class,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'class' => 'AppBundle:Category',
                    'choice_label' => 'name'

                ]
            )
            ;
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {


        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Post',
            'status' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_post';
    }


}
