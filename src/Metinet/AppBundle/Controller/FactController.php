<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\Fact;
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

    public function randomAction()
    {
        $fact = $this->get("fact_repository")->pickRandom();
        $fact = new Fact(1, "hufiahgzdoiuhaziuodhuazoihduiaz");
        $this->get("fact_repository")->save($fact);
        $fact = new Fact(1, "hufiahgzdoiuhaziuodhuazoihduiaz");
        $this->get("fact_repository")->save($fact);
        $fact = new Fact(1, "hufiahgzdoiuhaziuodhuazoihduiaz");
        $this->get("fact_repository")->save($fact);
        $fact = new Fact(1, "hufiahgzdoiuhaziuodhuazoihduiaz");
        $this->get("fact_repository")->save($fact);

        $this->get("doctrine.orm.entity_manager")->flush();

        return $this->render(
            'MetinetAppBundle:Fact:random.html.twig',
            array(
                "fact" => $fact
            )
        );
    }

    public function submitAction()
    {
        $fact = $this->get("fact_repository")->pickRandom();
        $fact = new Fact(1, "hufiahgzdoiuhaziuodhuazoihduiaz");

        $this->get("doctrine.orm.entity_manager")->flush();

        return $this->render(
            'MetinetAppBundle:Fact:submit.html.twig',
            array(
                "fact" => $fact
            )
        );
    }
}