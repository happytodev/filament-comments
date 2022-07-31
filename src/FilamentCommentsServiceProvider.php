<?php

namespace HappyToDev\FilamentComments;

use App\View\Components\FilamentComments;
use Filament\PluginServiceProvider;
use HappyToDev\FilamentComments\Console\InstallFilamentCommentsPackage;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;

class FilamentCommentsServiceProvider extends PackageServiceProvider
{
    public function boot()
    {

        //parent::boot();

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

            // Load config
            $this->publishes([
                __DIR__.'/../config/comments.php' => config_path('comments.php'),
            ], 'filament-comments-config');

            // Load Livewire components
            $this->publishes([
                __DIR__.'/../resources/views/livewire' => resource_path('views/livewire'),
                __DIR__.'/App/Http/Livewire/FilamentComments' => app_path('Http/Livewire/FilamentComments'),
            ], 'filament-comments-livewire');

            // Install Filement Comments command
            $this->commands([
                InstallFilamentCommentsPackage::class,
            ]);
        }

        Blade::component('filament-comments', FilamentComments::class);

        // Load views and defining key to call them
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-comments');
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
            ->hasMigration('create_filament-comments_table')
            ->hasCommand(FilamentCommentsCommand::class);
    }
}
