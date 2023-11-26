<?php

namespace WebMamba\AssetMapperBuilderBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AssetMapperBuilderCommand extends Command
{
    public function __construct(private readonly iterable $assetBuilders)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Building the application');

        foreach ($this->assetBuilders as $assetBuilder) {
            $assetBuilder->execute($output, $input);
        }

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this->setName('asset-map:build-assets');
        $this->setDescription('run all your asset-mapper build process');
    }
}