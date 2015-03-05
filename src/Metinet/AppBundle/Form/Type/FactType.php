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
                "number",
                array(
                    "attr" => array(
                        "class" => "form-control"
                    )
                )
            )
            ->add(
                "summary",
                "textarea",
                array(
                    "required" => false,
                    "attr" => array(
                        "class" => "form-control"
                    )
                )
            )
            ->add(
                "email",
                "email",
                array(
                    "required" => true,
                    "attr" => array(
                        "class" => "form-control"
                    )
                )
            )
            ->add(
                "submit",
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