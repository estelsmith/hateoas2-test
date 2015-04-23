<?php

namespace ApiBundle\Representation;

class CollectionRepresentation
{
    /**
     * @var string
     */
    private $resourceName;

    /**
     * @var mixed
     */
    private $resources;

    /**
     * @param string $resourceName
     * @param mixed $resources
     */
    public function __construct($resourceName, $resources)
    {
        $this->resourceName = $resourceName;
        $this->resources = $resources;
    }

    /**
     * @return string
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}
