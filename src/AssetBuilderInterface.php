<?php

namespace  WebMamba\AssetMapperBuilderBundle;

use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Process\Process;

interface AssetBuilderInterface
{
    public function execute(Output $output, Input $input): Process;
}