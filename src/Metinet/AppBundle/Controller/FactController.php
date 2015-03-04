<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\Fact;
use Metinet\AppBundle\Entity\FactState;
use Metinet\AppBundle\Form\Type\FactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class FactController extends Controller
{
    public function homeAction()
    {
        $facts = $this->get("fact_repository")->findAccepted();

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

    public function toValidateAction()
    {
        $facts = $this->get("fact_repository")->findPending();

        return $this->render(
            'MetinetAppBundle:Fact:toValidate.html.twig',
            array(
                "facts" => $facts,
            )
        );
    }

    public function validationAction($state, $id)
    {
        $fact = $this->get("fact_repository")->findOne($id);

        if (!in_array($state, array(
            FactState::ACCEPTED,
            FactState::REFUSED
        ))) {
            throw new Exception("Invalid status");
        }

        $fact->setState($state);
        $this->get("fact_repository")->save($fact);

        return new RedirectResponse(
            $this->generateUrl("to_validate")
        );
    }
}