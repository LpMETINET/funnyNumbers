<?php

namespace Metinet\AppBundle\Repository;


class MysqlFactRepository implements FactRepository
{
    private $configuration = [];
    private $connection;

    public function __construct($host, $user, $password, $database)
    {
        $this->configuration["host"] = $host;
        $this->configuration["user"] = $user;
        $this->configuration["password"] = $password;
        $this->configuration["database"] = $database;
    }

    public function getPDO()
    {
        return $this->connection = new \PDO(
            sprintf("mysql:%s;dbname=%s", $this->configuration["host"], $this->configuration["database"]),
            $this->configuration["user"],
            $this->configuration["password"]
        );
    }

    public function findAll()
    {

    }

    public function add($number, $summary)
    {

    }
}