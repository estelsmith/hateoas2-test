<?php

namespace ApiBundle\Configuration;

use Hateoas\Configuration\Provider\RelationProviderInterface as RelationProviderProviderInterface;
use Hateoas\Configuration\Relation;
use Hateoas\Configuration\RelationsRepository as BaseRelationsRepository;
use Hateoas\Configuration\Route;
use Metadata\MetadataFactoryInterface;

class RelationsRepository extends BaseRelationsRepository
{
    /**
     * @var array
     */
    private $selfRelationDefinitions;

    /**
     * @param MetadataFactoryInterface $metadataFactory
     * @param RelationProviderProviderInterface $relationProvider
     * @param array $selfRelationDefinitions
     */
    public function __construct(
        MetadataFactoryInterface $metadataFactory,
        RelationProviderProviderInterface $relationProvider,
        array $selfRelationDefinitions = []
    ) {
        parent::__construct($metadataFactory, $relationProvider);

        $this->selfRelationDefinitions = $selfRelationDefinitions;
    }

    public function getRelations($object)
    {
        $selfRelationDefinitions = $this->selfRelationDefinitions;
        $class = get_class($object);

        $relations = parent::getRelations($object);

        // Stop doctrine proxies from throwing off the original class name.
        $doctrinePrefix = 'Proxies\__CG__\\';
        if (strpos($class, $doctrinePrefix) === 0) {
            $class = str_replace($doctrinePrefix, '', $class);
        }

        if (array_key_exists($class, $selfRelationDefinitions)) {
            $relationDefinition = $selfRelationDefinitions[$class];

            $relations[] = new Relation(
                'self',
                new Route(
                    $relationDefinition['route'],
                    $relationDefinition['parameters']
                )
            );
        }

        return $relations;
    }
}
