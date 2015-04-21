<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/users")
 */
class UsersController extends Controller
{
    /**
     * @Route("/", name="api_users_get")
     * @Method("GET")
     */
    public function getUsersAction()
    {
        var_dump('here I am!');
        exit;
    }
}
