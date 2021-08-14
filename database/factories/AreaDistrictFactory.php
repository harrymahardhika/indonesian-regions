<?php

namespace Concatenate\IndonesianRegions\Database\Factories;

use Concatenate\IndonesianRegions\Models\AreaCity;
use Concatenate\IndonesianRegions\Models\AreaDistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

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
