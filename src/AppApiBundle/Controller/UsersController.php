<?php

namespace AppApiBundle\Controller;

use ApiBundle\Controller\JsonApiController;
use ApiBundle\Representation\ResourceRepresentation;
use AppBundle\Entity\User;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends JsonApiController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getOneAction(User $user)
    {
//        return $this->createResourceResponse($user);
        $representation = new ResourceRepresentation($user);

        return new Response(
            $this->serializer->serialize($representation, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    public function getAllAction()
    {

    }
}
