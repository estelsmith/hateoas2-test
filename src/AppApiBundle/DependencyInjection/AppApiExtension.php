<?php

namespace AppApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AppApiExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container)
    {
        $fileLocator = new FileLocator([__DIR__ . '/../Resources/config']);
        $yamlLoader = new YamlFileLoader($container, $fileLocator);
        $yamlLoader->load('services.yml');
    }
}
