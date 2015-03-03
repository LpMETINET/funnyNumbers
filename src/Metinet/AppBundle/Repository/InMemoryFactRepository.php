<?php

namespace Metinet\AppBundle\Repository;

use Metinet\AppBundle\Entity\Fact;

class InMemoryFactRepository implements FactRepository
{
    private $facts = [];

    public function __construct()
    {
        $this->save(
            new Fact(
                900000,
                "La longueur en kilomètres du réseau de canalisations d'eau potable français"
            )
        );
        $this->save(
            new Fact(
                5,
                "C'est le nombre de rhinocéros blancs du Nord encore en vie : deux dans des zoos, trois dans une réserve kenyane"
            )
        );
    }

    public function findAll() {
        return $this->facts;
    }

    public function pickRandom()
    {
        $key = array_rand($this->facts, 1);
        return $this->facts[$key];
    }

    public function save(Fact $fact)
    {
        if (null === $fact->getId()) {
            $ids = [];
            foreach($this->facts as $f) {
                $ids[] = $f->getId();
            }

            $id = count($ids) ? max($ids) + 1 : 1;
            $fact->setId($id);
        }

        $this->facts[$fact->getId()] = $fact;
    }
}