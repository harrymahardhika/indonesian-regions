<?php

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaCityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaCity extends Model
{
    use HasFactory;

    protected static function newFactory(): AreaCityFactory
    {
        return AreaCityFactory::new();
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(AreaProvince::class, 'province_id');
    }

    public function districts(): HasMany
    {
        return $this->hasMany(AreaDistrict::class, 'city_id');
    }
}
