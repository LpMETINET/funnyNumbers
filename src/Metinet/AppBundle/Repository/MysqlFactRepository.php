<?php

namespace Metinet\AppBundle\Repository;
use Metinet\AppBundle\Entity\Fact;
use \PDO;


class MysqlFactRepository implements FactRepository
{
    private $connection;

    public function __construct($host, $dbname, $username, $password) {
        $this->connection = new PDO(
            sprintf(
                "mysql:host=%s;dbname=%s",
                $host,
                $dbname
            ),
            $username,
            $password
        );
    }

    public function findAll() {
        $query = $this->connection->query("SELECT * FROM fact");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add(Fact $fact) 
    {

    }
}