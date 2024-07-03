<?php

namespace Flavorly\LaravelFlows;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelFlowsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-flows')
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
        // Booting the package
    }

    public function registeringPackage(): void
    {
        $this->app->singleton('flow-context-map', function ($app) {
            return new FlowContextMap();
        });
    }
}
