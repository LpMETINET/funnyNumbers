<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Repository\InMemoryFactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FactController extends Controller
{
    public function homeAction()
    {
        $this->get("fact_repository.in_memory")->add(90000, "tototototo");
        $this->get("fact_repository.in_memory")->add(150, "eziufgzaeiaehaz");

        return $this->render(
            'MetinetAppBundle:Fact:home.html.twig',
            array(
                "facts" => $this->get("fact_repository.in_memory")->findAll()
            )
        );
    }
}