<?php

namespace ApiBundle\Controller;

use ApiBundle\Representation\CollectionRepresentation;
use ApiBundle\Representation\ResourceRepresentation;
use AppBundle\Entity\Repository\UserRepository;
use AppBundle\Entity\User;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

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
        $this->serializer = $serializer;
        $this->userRepository = $userRepository;
    }

    public function getUserAction(User $user)
    {
        $representation = new ResourceRepresentation($user);

        return new Response(
            $this->serializer->serialize($representation, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    public function getUsersAction()
    {
        $users = new CollectionRepresentation(
            'api_users_get_all',
            $this->userRepository->findAll()
        );

        return new Response(
            $this->serializer->serialize($users, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}
