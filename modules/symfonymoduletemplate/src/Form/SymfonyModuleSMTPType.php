<?php

namespace SymfonyModule\Form;

use Configuration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SymfonyModuleSMTPType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('smtp_host', TextType::class, [
                'label' => 'Enter SMTP Host',
                'mapped' => true,
                'required' => true,
                'data' => Configuration::get('SF_TEMPLATE_SMTP_HOST' ?? '')
            ])
            ->add('smtp_port', IntegerType::class, [
                'label' => 'Enter SMTP Port',
                'mapped' => true,
                'required' => true,
                'data' => Configuration::get('SF_TEMPLATE_SMTP_PORT' ?? '')
            ])
            ->add('smtp_username', TextType::class, [
                'label' => 'Enter username',
                'mapped' => true,
                'required' => true,
                'data' => Configuration::get('SF_TEMPLATE_SMTP_USERNAME' ?? '')
            ])
            ->add('smtp_password', TextType::class, [
                'label' => 'Enter password',
                'mapped' => true,
                'required' => true,
                'data' => Configuration::get('SF_TEMPLATE_SMTP_PASSWORD' ?? '')
            ])
            ->add('smtp_from', EmailType::class, [
                'label' => 'Enter email',
                'mapped' => true,
                'required' => true,
                'data' => Configuration::get('SF_TEMPLATE_EMAIL_FROM' ?? '')
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