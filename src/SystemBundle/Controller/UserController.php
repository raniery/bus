<?php

namespace SystemBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SystemBundle\Entity\User;
use SystemBundle\Form\UserType;
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

    /**
     *
     */
    public function postAction(Request $request)
    {
        $form = $this->createForm(UserType::class, null, [
            'method' => 'POST'
        ]);

        $form->submit($request);

            \dump($form->isValid(), $form->getErrors(true));exit;
        if ($form->isValid()) {
            $data = $form->getData();
//            $this->userModel->create($user);
//
//
//            return View::create()
//                ->setStatusCode(Response::HTTP_OK)
//                ->setData($user);
        }

        return View::create()
            ->setStatusCode(Response::HTTP_OK)
            ->setData($form);
    }

}
