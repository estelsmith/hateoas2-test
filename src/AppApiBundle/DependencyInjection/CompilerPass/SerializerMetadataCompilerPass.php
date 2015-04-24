<?php

namespace AppApiBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SerializerMetadataCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('jms_serializer.metadata.file_locator');
        $metadataDirectories = $definition->getArguments()[0];

        $metadataDirectories['AppBundle'] = realpath(__DIR__ . '/../..') . '/Resources/config/serializer/AppBundle';

        $definition->replaceArgument(0, $metadataDirectories);
    }
}
