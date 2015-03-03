<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Repository\InMemoryFactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FactController extends Controller
{
    public function homeAction()
    {
        return $this->render(
            'MetinetAppBundle:Fact:home.html.twig',
            array(
                "facts" => $this->get("fact_repository.mysql")->findAll()
            )
        );
    }
}