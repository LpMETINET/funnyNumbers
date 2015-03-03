<?php

namespace Metinet\AppBundle\Entity;

class Fact
{
    protected $id;
    protected $number;

    public function getId()
    {
        return $this->id;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getSummary()
    {
        return $this->summary;
    }
    protected $summary;


}