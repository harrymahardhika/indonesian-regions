<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Tests;

use HarryM\IndonesianRegions\Database\Seeders\CitySeeder;
use HarryM\IndonesianRegions\Database\Seeders\DistrictSeeder;
use HarryM\IndonesianRegions\Database\Seeders\ProvinceSeeder;
use HarryM\IndonesianRegions\Database\Seeders\SubdistrictSeeder;
use HarryM\IndonesianRegions\Models\AreaCity;
use HarryM\IndonesianRegions\Models\AreaDistrict;
use HarryM\IndonesianRegions\Models\AreaProvince;
use HarryM\IndonesianRegions\Models\AreaSubdistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can seed provinces from CSV', function (): void {
    $this->seed(ProvinceSeeder::class);

    expect(AreaProvince::count())->toBeGreaterThan(0);

    $province = AreaProvince::where('code', '11')->first();
    expect($province->name)->toBe('ACEH');
});

it('can seed cities from CSV', function (): void {
    $this->seed(ProvinceSeeder::class);
    $this->seed(CitySeeder::class);

    expect(AreaCity::count())->toBeGreaterThan(0);

    $city = AreaCity::where('code', '1101')->first();
    expect($city->name)->toBe('KAB. ACEH SELATAN');
    expect($city->province->code)->toBe('11');
});

it('can seed districts from CSV', function (): void {
    $this->seed(ProvinceSeeder::class);
    $this->seed(CitySeeder::class);
    $this->seed(DistrictSeeder::class);

    expect(AreaDistrict::count())->toBeGreaterThan(0);

    $district = AreaDistrict::where('code', '110101')->first();
    expect($district->name)->toBe('Bakongan');
    expect($district->city->code)->toBe('1101');
});

it('can seed subdistricts from CSV', function (): void {
    $this->seed(ProvinceSeeder::class);
    $this->seed(CitySeeder::class);
    $this->seed(DistrictSeeder::class);
    $this->seed(SubdistrictSeeder::class);

    expect(AreaSubdistrict::count())->toBeGreaterThan(0);

    $subdistrict = AreaSubdistrict::where('code', '1101012001')->first();
    expect($subdistrict->name)->toBe('Keude Bakongan');
    expect($subdistrict->district->code)->toBe('110101');
});
