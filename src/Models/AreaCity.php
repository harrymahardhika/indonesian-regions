<?php

namespace Concatenate\IndonesianRegions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaCity extends Model
{
    public function province(): BelongsTo
    {
        return $this->belongsTo(AreaProvince::class, 'province_id');
    }

    public function districts(): HasMany
    {
        return $this->hasMany(AreaDistrict::class, 'city_id');
    }
}
