<?php

namespace SystemBundle\Model;

use SystemBundle\Entity\User;
use SystemBundle\Repository\UserRepository;

class UserModel
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $id
     * @return null|User
     */
    public function get($id)
    {
        return $this->userRepository->find($id);
    }
}