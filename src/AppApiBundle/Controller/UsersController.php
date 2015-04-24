<?php

namespace AppApiBundle\Controller;

use ApiBundle\Controller\JsonApiController;
use AppBundle\Entity\Repository\UserRepository;
use AppBundle\Entity\User;
use JMS\Serializer\SerializerInterface;

class UsersController extends JsonApiController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param SerializerInterface $serializer
     * @param UserRepository $userRepository
     */
    public function __construct(SerializerInterface $serializer, UserRepository $userRepository)
    {
        parent::__construct($serializer);

        $this->userRepository = $userRepository;
    }

    public function getOneAction(User $user)
    {
        return $this->createResourceResponse($user);
    }

    public function getAllAction()
    {
        return $this->createCollectionResponse($this->userRepository->findAll(), 'app_users_get_all');
    }

    public function getRelatedSchoolAction(User $user)
    {
        return $this->createResourceResponse(
            $user->getSchool(),
            'app_users_get_related_school',
            ['user' => $user->getId()]
        );
    }
}
