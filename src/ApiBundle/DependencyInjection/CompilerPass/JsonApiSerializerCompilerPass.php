<?php

namespace ApiBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class JsonApiSerializerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('hateoas.event_subscriber.json');

        $definition->replaceArgument(0, new Reference('api.serializer.json_api'));
    }
}
