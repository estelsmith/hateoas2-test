<?php

namespace ApiBundle\Controller;

use ApiBundle\Representation\CollectionRepresentation;
use ApiBundle\Representation\ResourceRepresentation;
use AppBundle\Entity\Repository\SchoolRepository;
use AppBundle\Entity\School;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SchoolsController extends Controller
{
    /**
     * @var SchoolRepository
     */
    private $schoolRepository;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     * @param SchoolRepository $schoolRepository
     */
    public function __construct(SerializerInterface $serializer, SchoolRepository $schoolRepository)
    {
        $this->serializer = $serializer;
        $this->schoolRepository = $schoolRepository;
    }

    public function getSchoolAction(School $school)
    {
        $representation = new ResourceRepresentation($school);

        return new Response(
            $this->serializer->serialize($representation, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    public function getSchoolsAction()
    {
        $schools = new CollectionRepresentation(
            $this->schoolRepository->findAll(),
            'api_schools_get_all'
        );

        return new Response(
            $this->serializer->serialize($schools, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    public function getUsersAction(School $school)
    {
        $users = new CollectionRepresentation(
            $school->getUsers(),
            'api_schools_get_school_users',
            ['school' => $school->getId()]
        );

        return new Response(
            $this->serializer->serialize($users, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}
