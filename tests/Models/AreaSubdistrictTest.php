<?php

declare(strict_types=1);

use HarryM\IndonesianRegions\Models\AreaDistrict;
use HarryM\IndonesianRegions\Models\AreaSubdistrict;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function Pest\Laravel\assertDatabaseHas;

it('can create a subdistrict', function (): void {
    /** @var AreaDistrict $district */
    $district = AreaDistrict::factory()->create();

    /** @var AreaSubdistrict $subdistrict */
    $subdistrict = AreaSubdistrict::factory()->create([
        'district_id' => $district->id,
        'code' => '3172010001',
        'name' => 'Pluit',
    ]);

    expect($subdistrict)->toBeInstanceOf(AreaSubdistrict::class);
    assertDatabaseHas('area_subdistricts', [
        'district_id' => $district->id,
        'code' => '3172010001',
        'name' => 'Pluit',
    ]);
});

it('has a district BelongsTo relationship', function (): void {
    /** @var AreaSubdistrict $subdistrict */
    $subdistrict = AreaSubdistrict::factory()->create();

    expect($subdistrict->district())->toBeInstanceOf(BelongsTo::class)
        ->and($subdistrict->district)->toBeInstanceOf(AreaDistrict::class);
});
