<?php

namespace Metinet\AppBundle\Repository;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserRepository implements UserProviderInterface
{
    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->entityManager
            ->getRepository("MetinetAppBundle:User")
            ->findOneBy(array(
                "username" => $username
            )
        );

        if (null === $user) {
            throw new UsernameNotFoundException();
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        $refreshedUser = $this->loadUserByUsername($user->getUsername());
        if (null === $refreshedUser) {

            throw new UsernameNotFoundException(sprintf(
                "Cannot find user named %s",
                $user->getUsername()
            ));
        }

        return $user;
    }

    public function supportsClass($class)
    {
        return $class === "\\Metinet\\AppBundle\\Entity\\User";
    }


}