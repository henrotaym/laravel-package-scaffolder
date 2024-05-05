<?php

namespace {{{{organizationName}}}}\{{{{packageName}}}};

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/*
 * @see https://github.com/spatie/laravel-package-tools
 */
class {{{{packageName}}}}ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('{{{{slugPackageName}}}}')
            ->hasConfigFile('{{{{slugPackageName}}}}')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile();
            });
    }
}
