<?php

namespace ApiBundle\Representation;

class ResourceRepresentation
{
    /**
     * @var mixed
     */
    private $resource;

    /**
     * @param mixed $resource
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }
}
