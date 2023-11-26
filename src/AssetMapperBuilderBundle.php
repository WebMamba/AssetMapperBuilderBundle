<?php

namespace WebMamba\AssetMapperBuilderBundle;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WebMamba\AssetMapperBuilderBundle\DependencyInjection\AssetMapperBuilderExtension;

class AssetMapperBuilderBundle extends Bundle
{
    protected function createContainerExtension(): ?ExtensionInterface
    {
        return new AssetMapperBuilderExtension();
    }
}