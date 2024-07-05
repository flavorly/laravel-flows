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
            ->hasMigration('create_flows_table')
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
        // Booting the package
    }

    public function registeringPackage(): void
    {
        // Registering the package
    }
}
