<?php

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaSubdistrictFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AreaSubdistrict extends Model
{
    use HasFactory;

    protected static function newFactory(): AreaSubdistrictFactory
    {
        return AreaSubdistrictFactory::new();
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(AreaDistrict::class, 'district_id');
    }
}
