<?php

namespace Happytodev\FilamentComments;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Happytodev\FilamentComments\Commands\FilamentCommentsCommand;

class FilamentCommentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-comments')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-comments_table')
            ->hasCommand(FilamentCommentsCommand::class);
    }
}
