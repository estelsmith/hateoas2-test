<?php

namespace ApiBundle\Representation;

class CollectionRepresentation
{
    /**
     * @var array
     */
    private $parameters;

    /**
     * @var mixed
     */
    private $resources;

    /**
     * @var string
     */
    private $route;

    /**
     * @param string $resources
     * @param string $route
     * @param array $parameters
     */
    public function __construct($resources, $route, array $parameters = [])
    {
        $this->resources = $resources;
        $this->route = $route;
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }
}
