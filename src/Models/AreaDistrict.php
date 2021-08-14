<?php

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaDistrictFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AreaDistrict extends Model
{
    use HasFactory;

    protected static function newFactory(): AreaDistrictFactory
    {
        return AreaDistrictFactory::new();
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(AreaCity::class, 'city_id');
    }
}
