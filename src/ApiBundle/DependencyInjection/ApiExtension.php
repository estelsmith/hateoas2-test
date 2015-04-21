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
        $fileLocator = new FileLocator([__DIR__ . '/../Resources/config']);
        $fileLoader = new YamlFileLoader($container, $fileLocator);
        $fileLoader->load('services.yml');
    }
}
