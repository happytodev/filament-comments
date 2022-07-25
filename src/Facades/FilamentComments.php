<?php

namespace Happytodev\FilamentComments\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Happytodev\FilamentComments\FilamentComments
 */
class FilamentComments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-comments';
    }
}
