<?php

namespace Metinet\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                "username",
                "text",
                array(
                    "attr" => array(
                        "class" => "form-control"
                    )
                )
            )
            ->add(
                'password',
                'repeated',
                array(
                    'type' => 'password',
                    'invalid_message' => 'Les mots de passe doivent correspondre',
                    'options' => array('required' => true),
                    'first_options'  => array(
                        'label' => 'Mot de passe',
                        'attr'  => array(
                            'class' => 'form-control'
                        )
                    ),
                    'second_options' => array(
                        'label' => 'Mot de passe (validation)',
                        'attr'  => array(
                            'class' => 'form-control'
                        )
                    ),
                )
            )
            ->add(
                "Register",
                "submit",
                array(
                    "label" => "Submit",
                    "attr"  => array(
                        'class' => 'form-control btn btn-primary'
                    )
                )
            );
    }

    public function getName()
    {
        return "register";
    }
}