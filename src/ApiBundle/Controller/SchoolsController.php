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
            'api_schools_get_all',
            $this->schoolRepository->findAll()
        );

        return new Response(
            $this->serializer->serialize($schools, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}