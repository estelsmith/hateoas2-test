<?php

namespace ApiBundle\Representation;

class ResourceRepresentation
{
    /**
     * @var mixed
     */
    private $resource;

    /**
     * @var string|null
     */
    private $route;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @param mixed $resource
     * @param string|null $route
     * @param array $parameters
     */
    public function __construct($resource, $route = null, array $parameters = [])
    {
        $this->resource = $resource;
        $this->route = $route;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return string|null
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return bool
     */
    public function hasRoute()
    {
        return strlen($this->route) > 0;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
