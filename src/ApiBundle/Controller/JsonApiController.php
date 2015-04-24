<?php

namespace ApiBundle\Controller;

use ApiBundle\Representation\ResourceRepresentation;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class JsonApiController extends Controller
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function createResourceResponse($resource, $route = null, array $parameters = [])
    {
        $representation = new ResourceRepresentation($resource, $route, $parameters);

        return new Response(
            $this->serializer->serialize($representation, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}
