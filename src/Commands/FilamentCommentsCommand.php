<?php

namespace Happytodev\FilamentComments\Commands;

use Illuminate\Console\Command;

class FilamentCommentsCommand extends Command
{
    public $signature = 'filament-comments';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
