<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Database\Factories;

use HarryM\IndonesianRegions\Models\AreaDistrict;
use HarryM\IndonesianRegions\Models\AreaSubdistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AreaSubdistrict>
 */
class AreaSubdistrictFactory extends Factory
{
    protected $model = AreaSubdistrict::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->postcode(),
            'name' => $this->faker->city(),
            'district_id' => AreaDistrict::factory()->create()->id,
        ];
    }
}
