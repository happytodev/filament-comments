<?php

namespace Happytodev\FilamentComments;

use App\View\Components\FilamentComments;
use Filament\PluginServiceProvider;
// use Happytodev\FilamentComments\FilamentComments;
use Happytodev\FilamentComments\Commands\FilamentCommentsCommand;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;

class FilamentCommentsServiceProvider extends PluginServiceProvider
{
    public function boot()
    {
        parent::boot();

        if ($this->app->runningInConsole()) {
            // Create the user model and if necessary overwrite it
            // @todo Find a better way to do this
            // if (! class_exists('User')) {
            $this->publishes([
                __DIR__.'/Models/Comment.php' => app_path('Models/Comment.php'),
            ], 'filament-comments-models');

            // Load Blade components
            $this->publishes([
                __DIR__.'/App/View/Components' => app_path('View/Components'),
                __DIR__.'/../resources/views/components' => resource_path('views/components'),
            ], 'filament-comments-components');
        }

        Blade::component('filament-comments', FilamentComments::class);
    }

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
            // ->hasViewComponents('happytodev', FilamentComments::class)
            ->hasMigration('create_filament-comments_table')
            ->hasCommand(FilamentCommentsCommand::class);
    }

    // Add model to be publishable
}
