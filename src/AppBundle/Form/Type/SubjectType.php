<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Subject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Title subject',
                'attr' => array('placeholder' => 'John Doe is not a real person')
            ))
            ->add('author', TextType::class, array(
                'label' => 'Author',
                'attr' => array('placeholder' => 'John Doe')
            ))
            ->add('description', TextType::class, array(
                'label' => 'Your question',
                'attr' => array('placeholder' => 'Here is the proof of his nonexistence ...')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Subject::class,
            'method' => 'POST',
        ));
    }
}