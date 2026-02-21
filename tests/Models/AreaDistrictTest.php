<?php

declare(strict_types=1);

use HarryM\IndonesianRegions\Models\AreaCity;
use HarryM\IndonesianRegions\Models\AreaDistrict;
use HarryM\IndonesianRegions\Models\AreaSubdistrict;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function Pest\Laravel\assertDatabaseHas;

it('can create a district', function (): void {
    /** @var AreaCity $city */
    $city = AreaCity::factory()->create();
    $district = AreaDistrict::factory()->create([
        'city_id' => $city->id,
        'code' => '317201',
        'name' => 'Penjaringan',
    ]);

    expect($district)->toBeInstanceOf(AreaDistrict::class);
    assertDatabaseHas('area_districts', [
        'city_id' => $city->id,
        'code' => '317201',
        'name' => 'Penjaringan',
    ]);
});

it('has a city BelongsTo relationship', function (): void {
    /** @var AreaDistrict $district */
    $district = AreaDistrict::factory()->create();

    expect($district->city())->toBeInstanceOf(BelongsTo::class)
        ->and($district->city)->toBeInstanceOf(AreaCity::class);
});

it('subdistricts relationship returns AreaSubdistrict instances', function (): void {
    /** @var AreaDistrict $district */
    $district = AreaDistrict::factory()->create();
    AreaSubdistrict::factory()->count(3)->create(['district_id' => $district->id]);

    expect($district->subdistricts)->toHaveCount(3);
    $district->subdistricts->each(function (AreaSubdistrict $subdistrict): void {
        expect($subdistrict)->toBeInstanceOf(AreaSubdistrict::class);
    });
});
