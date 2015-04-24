<?php

namespace AppApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Yaml\Parser;

class AppApiExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $config, ContainerBuilder $container)
    {
        $fileLocator = new FileLocator([__DIR__ . '/../Resources/config']);
        $yamlLoader = new YamlFileLoader($container, $fileLocator);
        $yamlLoader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container)
    {
        $fileLocator = new FileLocator([__DIR__ . '/../Resources/config']);

        $parser = new Parser();
        $mappingConfiguration = $parser->parse(file_get_contents($fileLocator->locate('mapping.yml')));

        $container->prependExtensionConfig('api', $mappingConfiguration);
    }
}
