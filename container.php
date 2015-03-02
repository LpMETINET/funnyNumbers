<?php

//Exemple de container d'injection de dépendance
class Container
{
    private $services = [];


    public function create($name, $className, array $arguments)
    {
        if (count($arguments) === 0) {
            $obj = new $className;
        } else {
            // Pour ajouter les arguments dans une class (à approfondir)
            $r = new ReflectionClass($className);
            $obj = $r->newInstanceArgs($arguments);
        }

        $this->services[$name] = $obj;
    }

    public function retrieve($name)
    {
        return $this->services[$name];
    }
}

$container = new Container();