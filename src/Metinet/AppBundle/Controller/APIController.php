<?php

namespace Metinet\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class APIController extends Controller
{
    public function homeAction()
    {
        $facts = $this->get("fact_repository")->findAccepted();
        $JsonedFacts = $this->get("json_serializer")->json_encode($facts, 'json');

        return new Response($JsonedFacts);
    }
}