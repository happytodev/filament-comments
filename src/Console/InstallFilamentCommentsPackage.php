<?php

namespace HappyToDev\FilamentComments\Console;

use Illuminate\Console\Command;

class InstallFilamentCommentsPackage extends Command
{
    protected $signature = 'filament-comments:install';

    protected $description = 'Install the Filaments plugin filament-comments';

    public function handle()
    {
        $this->info("Install the Filament's plugin filament-comments...");

        $this->info('>>> Publishing model...');

        $this->publishModels(true);
        $this->info('>>> Filament-comments model added...');

        // $this->creatingResources();

        // Deploying FilamentComments Components
        $this->info('>>> Publishing components...');
        $this->publishComponents(true);
        $this->info('>>> Filament-comments components deployed...');

        // Deploying FilamentComments Livewire
        $this->info('>>> Publishing livewire components...');
        $this->publishLivewire(true);
        $this->info('>>> Filament-comments livewire components deployed...');

        // Deploying FilamentComments config
        $this->info('>>> Publishing config...');
        $this->publishConfig(true);
        $this->info('>>> Filament-comments config deployed...');

        // Installation done with success
        $this->info('Filament-Comments Package installed successfully.');
    }

    private function publishConfig($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\FilamentComments\FilamentCommentsServiceProvider",
            '--tag' => 'filament-comments-config',
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishComponents($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\FilamentComments\FilamentCommentsServiceProvider",
            '--tag' => 'filament-comments-components',
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishLivewire($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\FilamentComments\FilamentCommentsServiceProvider",
            '--tag' => 'filament-comments-livewire',
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    // private function updateConfigFile()
    // {
    //     $params = [
    //         '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
    //         '--tag' => "typhoon-filament-config"
    //     ];

    //     $this->call('vendor:publish', $params);
    // }

    // private function configExists($fileName)
    // {
    //     return File::exists(config_path($fileName));
    // }

    // private function shouldOverwriteConfig()
    // {
    //     return $this->confirm(
    //         'Config file already exists. Do you want to overwrite it?',
    //         false
    //     );
    // }

    // private function publishConfiguration($forcePublish = false)
    // {
    //     $params = [
    //         '--provider' => "JohnDoe\BlogPackage\BlogPackageServiceProvider",
    //         '--tag' => "config"
    //     ];

    //     if ($forcePublish === true) {
    //         $params['--force'] = true;
    //     }

    //     $this->call('vendor:publish', $params);
    // }

    // Publish needed models during the installation process
    private function publishModels($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\FilamentComments\FilamentCommentsServiceProvider",
            '--tag' => 'filament-comments-models',
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    // Installing resources needed to manage default models provided after
    // install in typhoon
    // public function creatingResources()
    // {
    //     $this->info('Creating resources...');

    //     $params = [
    //         '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
    //         '--tag' => "typhoon-filament-resources"
    //     ];

    //     $this->call('vendor:publish', $params);
    // }

    // private function writeCss()
    // {
    //     $this->info('Writing CSS...');

    //     $params = [
    //         '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
    //         '--tag' => "typhoon-css",
    //         '--force' => true
    //     ];

    //     $this->call('vendor:publish', $params);
    // }
}
