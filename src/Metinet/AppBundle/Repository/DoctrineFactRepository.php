<?php

namespace Metinet\AppBundle\Repository;

use Doctrine\ORM\EntityManager;
use Metinet\AppBundle\Entity\Fact;

class DoctrineFactRepository implements FactRepository
{
    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function findAll() {
        $query = $this->entityManager->createQuery(
            'SELECT f
            FROM MetinetAppBundle:Fact f'
        );
        return $query->getResult();
    }

    public function add(Fact $fact)
    {

    }
}