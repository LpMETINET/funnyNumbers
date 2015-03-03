<?php

namespace Metinet\AppBundle\Repository;

use Doctrine\ORM\EntityManager;
use Metinet\AppBundle\Entity\Fact;

class DoctrineFactRepository implements FactRepository
{
    private $entityManager;
    private $facts;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function findAll() {
        $query = $this->entityManager->getRepository('MetinetAppBundle:Fact')->createQueryBuilder('f');
        return $query->getQuery()->getResult();
        /*****************************************/
        /** SIMPLEST WAY
        $query = $this->entityManager->createQuery(
            'SELECT f
            FROM MetinetAppBundle:Fact f'
        );
        return $query->getResult();
         * */
        /*****************************************/
    }

    public function pickRandom()
    {
        $connection = $this->entityManager->getConnection();
        $ids = $connection->fetchAll("SELECT id FROM fact");
        $randomId = $ids[array_rand($ids)]["id"];

        $query = $this->entityManager->createQuery(
            "SELECT fact FROM MetinetAppBundle:Fact fact WHERE fact.id = :randomId"
        );

        $query->setParameter("randomId", $randomId);
        return $query->getSingleResult();
    }

    public function save(Fact $fact)
    {
        $this->entityManager->persist($fact);
    }
}