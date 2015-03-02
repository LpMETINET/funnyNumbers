<?php

namespace Metinet\AppBundle\Repository;

interface FactRepository
{
    public function findAll();
    public function add($number, $summary);
}