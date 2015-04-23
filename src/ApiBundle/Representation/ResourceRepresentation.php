<?php

namespace ApiBundle\Representation;

class ResourceRepresentation
{
    /**
     * @var array
     */
    private $parameters;

    /**
     * @var mixed
     */
    private $resource;

    /**
     * @var string
     */
    private $route;

    /**
     * @param string $route
     * @param array $parameters
     * @param mixed $resource
     */
    public function __construct($route, $parameters, $resource)
    {
        $this->route = $route;
        $this->parameters = $parameters;
        $this->resource = $resource;
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
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }
}
