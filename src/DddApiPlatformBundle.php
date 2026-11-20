<?php

declare(strict_types=1);

namespace AlexandreBulete\DddApiPlatformBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class DddApiPlatformBundle extends AbstractBundle
{
    /**
     * @param array<mixed, mixed> $config
     */
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../src/Resources/config/services.php');
    }
}

