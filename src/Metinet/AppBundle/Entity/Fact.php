<?php

namespace Metinet\AppBundle\Entity;

class Fact
{
    protected $id;
    protected $number;
    protected $summary;

    public function __construct($number = null, $summary = null)
    {
        $this->number = $number;
        $this->summary = $summary;
    }

    public function setId($id)
    {
        if (null !== $this->id) {
            throw new \Exception("Can't update Entity id");
        }

        $this->id = $id;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

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


}