<?php

namespace SymfonyModule\Form;

use Configuration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SymfonyModuleMailerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mailer_to', EmailType::class, [
                'label' => 'Enter mail receiver',
                'mapped' => true,
            ])
            ->add('mailer_from', HiddenType::class, [
                'mapped' => true,
                'data' => Configuration::get('SF_TEMPLATE_EMAIL_FROM' ?? '')
            ])
            ->add('mailer_subject', TextType::class, [
                'label' => 'Enter Email subject'
            ])
            ->add('mailer_message', TextareaType::class, [
                'label' => 'Enter message here'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}