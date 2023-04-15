<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\Database\Factories;

use Concatenate\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Eloquent\Factories\Factory;

class AreaProvinceFactory extends Factory
{
    protected $model = AreaProvince::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->postcode(),
            'name' => $this->faker->city(),
        ];
    }
}
