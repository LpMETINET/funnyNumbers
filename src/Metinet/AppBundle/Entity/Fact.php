<?php

namespace Metinet\AppBundle\Entity;

use Symfony\Component\Config\Definition\Exception\Exception;

class Fact
{
    protected $id;
    protected $number;
    protected $summary;
    protected $email;
    protected $state;

    public function __construct($number = null, $summary = null, $email = null)
    {
        $this->number = $number;
        $this->summary = $summary;
        $this->email = $email;
        $this->state = "pending";
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        if (!in_array($state, [
            FactState::PENDING,
            FactState::ACCEPTED,
            FactState::REFUSED
        ])) {
            throw new Exception("Invalid Status");
        }
        $this->state = $state;
    }
}