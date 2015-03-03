<?php

namespace Metinet\AppBundle\Repository;

use Metinet\AppBundle\Entity\Fact;

interface FactRepository
{
    public function findAll();
    public function pickRandom();
    public function save(Fact $fact);
}