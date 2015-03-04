<?php

namespace Metinet\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array("class" => "nav nav-tabs"));

        $menu->addChild('Home', array('route' => 'home'));
        $menu->addChild('Random', array('route' => 'random'));
        $menu->addChild('Submit', array('route' => 'submit'));
        $menu->addChild("To Validate", array('route' => 'to_validate'));

        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $logoutItem = $menu->addChild('Logout', array('route' => 'logout'));
            $logoutItem
                ->setLinkAttributes(array(
                    'id' => 'logout-link',
                    'class' => 'btn btn-default',
                ))
            ;
        }

/*        // access services from the container!
        $em = $this->container->get('doctrine')->getManager();
        // findMostRecent and Blog are just imaginary examples
        $fact = $em->getRepository('Metinet:AppBundle:Fact')->findMostRecent();

        $menu->addChild('Latest Blog Post', array(
            'route' => 'blog_show',
            'routeParameters' => array('id' => $fact->getId())
        ));

        // you can also add sub level's to your menu's as follows
        $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children*/

        return $menu;
    }
}