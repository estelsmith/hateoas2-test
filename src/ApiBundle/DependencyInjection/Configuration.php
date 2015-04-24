<?php

namespace ApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $root = $treeBuilder->root('api');

        $root
            ->children()
                ->arrayNode('mapping')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('resource_types')
                            ->useAttributeAsKey('class')
                            ->prototype('array')
                                ->children()
                                    ->scalarNode('class')->end()
                                    ->scalarNode('type')->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('relations')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('self')
                                    ->prototype('array')
                                        ->children()
                                            ->scalarNode('class')->end()
                                            ->scalarNode('route')->end()
                                            ->arrayNode('parameters')
                                                ->prototype('scalar')->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
