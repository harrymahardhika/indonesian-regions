<?php

declare(strict_types=1);

use HarryM\IndonesianRegions\Models\AreaCity;
use HarryM\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function Pest\Laravel\assertDatabaseHas;

it('can create a province', function (): void {
    /** @var AreaProvince $province */
    $province = AreaProvince::factory()->create([
        'code' => '31',
        'name' => 'DKI Jakarta',
    ]);

    expect($province)->toBeInstanceOf(AreaProvince::class);
    assertDatabaseHas('area_provinces', [
        'code' => '31',
        'name' => 'DKI Jakarta',
    ]);
});

it('has a cities HasMany relationship', function (): void {
    /** @var AreaProvince $province */
    $province = AreaProvince::factory()->create();

    expect($province->cities())->toBeInstanceOf(HasMany::class);
});

it('cities relationship returns AreaCity instances', function (): void {
    /** @var AreaProvince $province */
    $province = AreaProvince::factory()->create();
    AreaCity::factory()->count(3)->create(['province_id' => $province->id]);

    expect($province->cities)->toHaveCount(3);
    $province->cities->each(function (AreaCity $city): void {
        expect($city)->toBeInstanceOf(AreaCity::class);
    });
});
