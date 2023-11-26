# AssetMapperBuilderBundle
A central AssetMapper bundle to just have one command to run to build all your asset at once.

## How to use it

Install the bundle:

For the moment fork the repo

Then you can run the central build command
```bash
  bin/console asset-map:build-assets
```

## Bundle Integration

How work this bundle is pretty simple. This bundle define a tag 'asset_mapper_builder.asset_builder', and an interface `AssetBuilderInteface`.

To add a new integration you just need to create a class that implement the AssetBuilderInterface.

```php
class SassAssetBuilder implements AssetBuilderInterface
{
    public function __construct(
        private readonly SassBuilder $sassBuilder
    )
    {}

    public function execute(Output $output, Input $input): Process
    {
        $process = $this->sassBuilder->runBuild(false);

        $process->wait(function ($type, $buffer) use ($output) {
            $output->write($buffer);
        });

        return $process;
    }
}
```

Then when your run `asset-map:build-assets` the bundle detect your builder and execute the process.


