<?php

namespace Concatenate\IndonesianRegions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AreaDistrict extends Model
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(AreaCity::class, 'city_id');
    }
}
