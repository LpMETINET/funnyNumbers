<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Repository\InMemoryFactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FactController extends Controller
{
    public function homeAction()
    {
        $this->container->get("in_memory_fact_repository")->add(90000, "tototototo");
        $this->container->get("in_memory_fact_repository")->add(150, "eziufgzaeiaehaz");

        return $this->render(
            'MetinetAppBundle:Fact:home.html.twig',
            array(
                "facts" => $this->container->get("in_memory_fact_repository")->findAll()
            )
        );
    }
}