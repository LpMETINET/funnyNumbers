<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Repository\InMemoryFactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FactController extends Controller
{
    public function homeAction()
    {
        $facts = $this->get("fact_repository")->findAll();

        return $this->render(
            'MetinetAppBundle:Fact:home.html.twig',
            array(
                "facts" => $facts
            )
        );
    }
}