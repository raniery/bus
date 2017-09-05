<?php

namespace SystemBundle\Model;

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

    public function get($id)
    {
        return $this->userRepository->find($id);
    }
}