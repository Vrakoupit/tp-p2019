<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Reply;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleReply', TextType::class, array(
                'label' => 'Title reply',
                'attr' => array('placeholder' => 'John Doe is not a real person')
            ))
            ->add('author', TextType::class, array(
                'label' => 'Author',
                'attr' => array('placeholder' => 'John Doe')
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'attr' => array('placeholder' => 'john.doe@johndoe.doe')
            ))
            ->add('reply')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Reply::class,
            'method' => 'POST',
        ));
    }
}