<?php

namespace AppApiBundle\Controller;

use ApiBundle\Controller\JsonApiController;
use AppBundle\Entity\Repository\SchoolRepository;
use AppBundle\Entity\School;
use JMS\Serializer\SerializerInterface;

class SchoolsController extends JsonApiController
{
    /**
     * @var SchoolRepository
     */
    private $schoolRepository;

    /**
     * @param SerializerInterface $serializer
     * @param SchoolRepository $schoolRepository
     */
    public function __construct(SerializerInterface $serializer, SchoolRepository $schoolRepository)
    {
        parent::__construct($serializer);

        $this->schoolRepository = $schoolRepository;
    }

    public function getOneAction(School $school)
    {
        return $this->createResourceResponse($school);
    }

    public function getAllAction()
    {
        return $this->createCollectionResponse($this->schoolRepository->findAll(), 'app_schools_get_all');
    }
}
