<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Database\Seeders;

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        if (config('indonesian-regions.enable_provinces')) {
            $this->call(ProvinceSeeder::class);
        }

        if (config('indonesian-regions.enable_cities')) {
            $this->call(CitySeeder::class);
        }

        if (config('indonesian-regions.enable_districts')) {
            $this->call(DistrictSeeder::class);
        }

        if (config('indonesian-regions.enable_subdistricts')) {
            $this->call(SubdistrictSeeder::class);
        }
    }
}
