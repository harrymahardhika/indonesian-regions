<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Database\Factories;

use HarryM\IndonesianRegions\Models\AreaCity;
use HarryM\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AreaCity>
 */
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
