<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Database\Factories;

use HarryM\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AreaProvince>
 */
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
