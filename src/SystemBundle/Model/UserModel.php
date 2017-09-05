<?php

namespace SystemBundle\Model;

use Doctrine\ORM\EntityManager;
use SystemBundle\Entity\User;
use SystemBundle\Repository\UserRepository;

class UserModel
{

    /**
     * @var UserRepository
     * @var EntityManager
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository, EntityManager $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param $id
     * @return null|User
     */
    public function get($id)
    {
        return $this->userRepository->find($id);
    }

    public function create(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}