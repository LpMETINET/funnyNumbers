<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\User;
use Metinet\AppBundle\Form\Type\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render("MetinetAppBundle:Security:login.html.twig", array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

    public function registerAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(new RegisterType(), $user);

        if ($request->isMethod("POST")) {
            $form->submit($request);
            if ($form->isValid()) {
                $this->get('user_repository')->save($user);

                // Token creation to auto connect the user
                $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
                $this->get('security.token_storage')->setToken($token);

                return new RedirectResponse(
                    $this->generateUrl("home")
                );
            }
        }

        return $this->render(
            "MetinetAppBundle:Security:register.html.twig",
            array(
                'form' => $form->createView()
            )
        );
    }
}