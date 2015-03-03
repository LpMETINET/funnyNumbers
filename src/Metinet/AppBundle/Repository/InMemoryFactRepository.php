<?php

namespace Metinet\AppBundle\Repository;

use Metinet\AppBundle\Entity\Fact;

class InMemoryFactRepository implements FactRepository
{
    private $facts = [];

    public function findAll() {
        return $this->facts;
    }

    public function add(Fact $fact) {
        $this->facts[] = $fact;
    }
}