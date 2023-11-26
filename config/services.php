<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use WebMamba\AssetMapperBuilderBundle\Command\AssetMapperBuilderCommand;
use WebMamba\AssetMapperBuilderBundle\AssetBuilderInterface;
use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_iterator;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->instanceof(AssetBuilderInterface::class)
            ->tag('asset_mapper_builder.asset_builder')
        ->set('asset_mapper_builder.command', AssetMapperBuilderCommand::class)
            ->args([
                '$assetBuilders' => tagged_iterator('asset_mapper_builder.asset_builder'),
            ])
            ->tag('console.command')
    ;
};
