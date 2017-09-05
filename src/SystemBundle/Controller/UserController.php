<?php

namespace SystemBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use SystemBundle\Model\UserModel;

class UserController extends FOSRestController
{

    /**
     * @var UserModel
     */
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAction($id)
    {
        $user = $this->userModel->get($id);
        return View::create()
            ->setStatusCode(Response::HTTP_OK)
            ->setData($user);
    }

}
