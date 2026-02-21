<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Facades;

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
