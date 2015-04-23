<?php

namespace ApiBundle\Representation;

class CollectionRepresentation
{
    /**
     * @var mixed
     */
    private $resources;

    /**
     * @var string
     */
    private $route;

    /**
     * @param string $route
     * @param mixed $resources
     */
    public function __construct($route, $resources)
    {
        $this->route = $route;
        $this->resources = $resources;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}
