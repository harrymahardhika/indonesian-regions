<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\Database\Factories;

use Concatenate\IndonesianRegions\Models\AreaCity;
use Concatenate\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Eloquent\Factories\Factory;

class AreaCityFactory extends Factory
{
    protected $model = AreaCity::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->postcode(),
            'name' => $this->faker->city(),
            'province_id' => AreaProvince::factory()->create()->id,
        ];
    }
}
