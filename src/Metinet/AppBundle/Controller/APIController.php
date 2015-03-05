<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\Fact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class APIController extends Controller
{
    public function homeAction()
    {
        $facts = $this->get("fact_repository")->findAccepted();
        $JsonedFacts = $this->get("json_serializer")->serialize($facts);

        return new Response($JsonedFacts);
    }

    public function newAction(Request $request)
    {
        if ($request->getMethod() === "POST") {
            $factDecoded = json_decode($request->getContent());
            $fact = new Fact($factDecoded->number, $factDecoded->summary, $factDecoded->email);
            $this->get('fact_repository')->save($fact);
        }

        return new Response("Good");
    }
}