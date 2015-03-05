<?php

namespace Metinet\AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    protected $id;
    protected $username;
    protected $password;
    protected $salt;
    protected $roles;

    public function __construct() {
        $this->roles = ['ROLE_USER'];
    }

    public function setId($id)
    {
        if (null !== $this->id) {
            throw new \Exception("Can't update Entity id");
        }

        $this->id = $id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function addRole($role)
    {
        $this->roles[] = $role;
    }

    public function eraseCredentials()
    {
        $this->password = null;
    }
}