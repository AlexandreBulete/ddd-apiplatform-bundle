# DDD API Platform Bundle

Symfony Bundle for the DDD API Platform Bridge. Provides service wiring and configuration for API Platform integration.

## Installation

```bash
composer require alexandrebulete/ddd-apiplatform-bundle
```

## Configuration

Add the bundle to your `config/bundles.php`:

```php
return [
    // ...
    AlexandreBulete\DddApiPlatformBundle\DddApiPlatformBundle::class => ['all' => true],
];
```

## Features

This bundle automatically registers services from `ddd-apiplatform-bridge`:
- `Paginator` available for use in your State Providers

## Usage

Create your own State Providers using the Paginator:

```php
use AlexandreBulete\DddApiPlatformBridge\State\Paginator;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;

class GetPostsProvider implements ProviderInterface
{
    public function __construct(
        private QueryBusInterface $queryBus,
    ) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $posts = $this->queryBus->ask(new GetPostsQuery(/* ... */));
        
        // Return Paginator for pagination support
        return new Paginator(/* ... */);
    }
}
```

