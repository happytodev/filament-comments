<?php

namespace HappyToDev\FilamentComments\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \HappyToDev\FilamentComments\FilamentComments
 */
class FilamentComments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-comments';
    }
}
