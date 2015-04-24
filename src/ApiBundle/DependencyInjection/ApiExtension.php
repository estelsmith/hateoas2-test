<?php

namespace ApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ApiExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $config);

        $fileLocator = new FileLocator([__DIR__ . '/../Resources/config']);
        $fileLoader = new YamlFileLoader($container, $fileLocator);
        $fileLoader->load('services.yml');

        $container->setParameter('api.serializer.mapping.resource_types', $config['mapping']['resource_types']);
        $container->setParameter('api.serializer.mapping.links.self', $config['mapping']['relations']['self']);
    }
}
