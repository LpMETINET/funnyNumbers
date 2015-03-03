<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Repository\InMemoryFactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FactController extends Controller
{
    public function homeAction()
    {
        $facts = $this->get("fact_repository.doctrine")->findAll();

        return $this->render(
            'MetinetAppBundle:Fact:home.html.twig',
            array(
                "facts" => $facts
            )
        );
    }
}