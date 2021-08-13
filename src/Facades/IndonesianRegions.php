<?php

namespace Concatenate\IndonesianRegions\Facades;

use Illuminate\Support\Facades\Facade;

class IndonesianRegions extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'indonesian-regions';
    }
}
