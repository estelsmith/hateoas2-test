<?php

namespace AppApiBundle;

use AppApiBundle\DependencyInjection\CompilerPass\SerializerMetadataCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppApiBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new SerializerMetadataCompilerPass());
    }
}
