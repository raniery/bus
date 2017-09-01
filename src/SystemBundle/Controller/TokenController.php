<?php

namespace SystemBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class TokenController extends FOSRestController
{
    public function getAction(Request $request)
    {
        $username = $request->query->get('username');
        $password = $request->query->get('password');

        $data = array("hello" => "world");
        $view = $this->view($data)->setTemplate("SystemBundle:Token:login.html.twig");
        return $this->handleView($view);
    }
}
