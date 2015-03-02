<?php

namespace Metinet\AppBundle\Repository;

class InMemoryFactRepository implements FactRepository
{
    private $facts = [];

    public function findAll() {
        return $this->facts;
    }

    public function add($number, $summary) {
        $fact["number"]  = $number;
        $fact["summary"] = $summary;

        $this->facts[] = $fact;
    }
}