<?php

namespace Concatenate\IndonesianRegions\Database\Factories;

use Concatenate\IndonesianRegions\Models\AreaDistrict;
use Concatenate\IndonesianRegions\Models\AreaSubdistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

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
