<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\Fact;
use Metinet\AppBundle\Form\Type\FactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function submitAction(Request $request)
    {
        $fact = new Fact(-1, "Valeur par défaut");

        $form = $this->createForm(new FactType(), $fact);

        if ($request->isMethod("POST")) {
            $form->submit($request);
            if ($form->isValid()) {
                $this->get('fact_repository')->save($fact);

                return new RedirectResponse(
                    $this->generateUrl("home")
                );
            }
        }
        return $this->render(
            'MetinetAppBundle:Fact:submit.html.twig',
            array(
                "form" => $form->createView()
            )
        );
    }
}