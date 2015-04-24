<?php

namespace ApiBundle;

use ApiBundle\DependencyInjection\CompilerPass\JsonApiSerializerCompilerPass;
use ApiBundle\DependencyInjection\CompilerPass\RelationsRepositoryCompilerPass;
use ApiBundle\DependencyInjection\CompilerPass\SerializerMetadataCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApiBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new JsonApiSerializerCompilerPass());
        $container->addCompilerPass(new RelationsRepositoryCompilerPass());
    }
}
