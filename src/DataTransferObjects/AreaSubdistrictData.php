<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\DataTransferObjects;

use Spatie\LaravelData\Data;

class AreaSubdistrictData extends Data
{
    public function __construct(
        public int $id,
        public int $district_id,
        public string $code,
        public string $name,
    ) {
    }
}
