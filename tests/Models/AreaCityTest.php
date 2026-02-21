<?php

declare(strict_types=1);

use HarryM\IndonesianRegions\Models\AreaCity;
use HarryM\IndonesianRegions\Models\AreaDistrict;
use HarryM\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function Pest\Laravel\assertDatabaseHas;

it('can create a city', function (): void {
    /** @var AreaProvince $province */
    $province = AreaProvince::factory()->create();

    $city = AreaCity::factory()->create([
        'province_id' => $province->id,
        'code' => '3172',
        'name' => 'Kota Jakarta Utara',
    ]);

    expect($city)->toBeInstanceOf(AreaCity::class);
    assertDatabaseHas('area_cities', [
        'province_id' => $province->id,
        'code' => '3172',
        'name' => 'Kota Jakarta Utara',
    ]);
});

it('has a province BelongsTo relationship', function (): void {
    /** @var AreaCity $city */
    $city = AreaCity::factory()->create();

    expect($city->province())->toBeInstanceOf(BelongsTo::class)
        ->and($city->province)->toBeInstanceOf(AreaProvince::class);
});

it('has a districts HasMany relationship', function (): void {
    /** @var AreaCity $city */
    $city = AreaCity::factory()->create();

    expect($city->districts())->toBeInstanceOf(HasMany::class);
});

it('districts relationship returns AreaDistrict instances', function (): void {
    /** @var AreaCity $city */
    $city = AreaCity::factory()->create();
    AreaDistrict::factory()->count(3)->create(['city_id' => $city->id]);

    expect($city->districts)->toHaveCount(3);
    $city->districts->each(function (AreaDistrict $district): void {
        expect($district)->toBeInstanceOf(AreaDistrict::class);
    });
});
