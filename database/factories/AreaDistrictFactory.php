<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Database\Factories;

use HarryM\IndonesianRegions\Models\AreaCity;
use HarryM\IndonesianRegions\Models\AreaDistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AreaDistrict>
 */
class AreaDistrictFactory extends Factory
{
    protected $model = AreaDistrict::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->postcode(),
            'name' => $this->faker->city(),
            'city_id' => AreaCity::factory()->create()->id,
        ];
    }
}
