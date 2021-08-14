<?php

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaProvinceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaProvince extends Model
{
    use HasFactory;

    protected static function newFactory(): AreaProvinceFactory
    {
        return AreaProvinceFactory::new();
    }

    public function cities(): HasMany
    {
        return $this->hasMany(AreaCity::class, 'province_id');
    }
}
