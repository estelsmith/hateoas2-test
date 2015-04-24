<?php

namespace AppApiBundle\Controller;

use ApiBundle\Controller\JsonApiController;
use AppBundle\Entity\User;

class UsersController extends JsonApiController
{
    public function getOneAction(User $user)
    {
        return $this->createResourceResponse($user);
    }

    public function getAllAction()
    {

    }
}
