<?php

namespace ApiBundle\DependencyInjection\CompilerPass;

use ApiBundle\Configuration\RelationsRepository;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RelationsRepositoryCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->setParameter('hateoas.configuration.relations_repository.class', RelationsRepository::class);

        $definition = $container->getDefinition('hateoas.configuration.relations_repository');
        $definition->addArgument($container->getParameter('api.serializer.mapping.links.self'));
    }
}
