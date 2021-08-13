<?php

namespace Concatenate\IndonesianRegions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AreaSubdistrict extends Model
{
    public function district(): BelongsTo
    {
        return $this->belongsTo(AreaDistrict::class, 'district_id');
    }
}
