<?php

namespace Metinet\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                "number",
                "number"
            )
            ->add(
                "summary",
                "textarea",
                array(
                    "required" => false
                )
            )
            ->add(
                "email",
                "email",
                array(
                    "required" => true
                )
            )
            ->add(
                "submit",
                "submit",
                array(
                    "label" => "Submit"
                )
            );
    }

    public function getName()
    {
        return "fact";
    }

    public function setDefaultOption(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                "data-class" => "Metinet\\AppBundle\\Entity\\Fact"
            )
        );
    }
}