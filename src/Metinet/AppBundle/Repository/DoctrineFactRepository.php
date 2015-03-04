<?php

namespace Metinet\AppBundle\Repository;

use Doctrine\ORM\EntityManager;
use Metinet\AppBundle\Entity\Fact;
use Metinet\AppBundle\Entity\FactState;

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
        $ids = $connection->fetchAll("SELECT id FROM fact WHERE state = 'accepted'");
        $randomId = $ids[array_rand($ids)]["id"];

        return $this->entityManager->getRepository("MetinetAppBundle:Fact")->findOneBy(array(
            "id" => $randomId
        ));
    }

    public function findAccepted()
    {
        $queryBuilder = $this->getQueryBuilderByState();
        $queryBuilder->setParameter("state", FactState::ACCEPTED);

        return $queryBuilder->getQuery()->getResult();
    }

    private function getQueryBuilderByState()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select("fact")
            ->from("MetinetAppBundle:Fact", "fact")
            ->where(
                $queryBuilder->expr()->like(
                    "fact.state",
                    ":state")
            );

        return $queryBuilder;
    }

    public function findPending()
    {
        return $this->entityManager->getRepository("MetinetAppBundle:Fact")->findBy(array(
            "state" => "pending"
        ));
    }

    public function findOne($id)
    {
        return $this->entityManager->getRepository("MetinetAppBundle:Fact")->find($id);
    }

    public function save(Fact $fact)
    {
        $this->entityManager->persist($fact);
        $this->entityManager->flush();
    }
}