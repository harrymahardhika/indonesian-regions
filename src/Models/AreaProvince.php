<?php

namespace Concatenate\IndonesianRegions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaProvince extends Model
{
    public function cities(): HasMany
    {
        return $this->hasMany(AreaCity::class, 'province_id');
    }
}
