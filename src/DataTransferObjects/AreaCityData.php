<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\DataTransferObjects;

use Spatie\LaravelData\Data;

class AreaCityData extends Data
{
    public function __construct(
        public int $id,
        public int $province_id,
        public string $code,
        public string $name,
    ) {}
}
