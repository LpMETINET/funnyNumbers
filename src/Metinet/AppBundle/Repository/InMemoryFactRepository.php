<?php

namespace Metinet\AppBundle\Repository;

use Metinet\AppBundle\Entity\Fact;

class InMemoryFactRepository implements FactRepository
{
    private $facts = [];

    public function __construct()
    {
        $this->facts[] =
            [
                "number" => 900000,
                "summary" => "La longueur en kilomètres du réseau de canalisations d'eau potable français"
            ];
        $this->facts[] =
            [
                "number" => 5,
                "summary" => "C'est le nombre de rhinocéros blancs du Nord encore en vie : deux dans des zoos, trois dans une réserve kenyane"
            ];
    }

    public function findAll() {
        return $this->facts;
    }

    public function add(Fact $fact) {
        $this->facts[] = $fact;
    }

    public function pickRandom()
    {
        $key = array_rand($this->facts, 1);
        return $this->facts[$key];
    }
}