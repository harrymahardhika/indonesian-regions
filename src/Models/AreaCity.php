<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaCityFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Concatenate\IndonesianRegions\Models\AreaCity.
 *
 * @property int                                                                                               $id
 * @property int                                                                                               $province_id
 * @property string                                                                                            $code
 * @property string                                                                                            $name
 * @property \Illuminate\Support\Carbon|null                                                                   $created_at
 * @property \Illuminate\Support\Carbon|null                                                                   $updated_at
 * @property \Illuminate\Database\Eloquent\Collection<int, \Concatenate\IndonesianRegions\Models\AreaDistrict> $districts
 * @property int|null                                                                                          $districts_count
 * @property \Concatenate\IndonesianRegions\Models\AreaProvince                                                $province
 *
 * @method static AreaCityFactory  factory($count = null, $state = [])
 * @method static Builder|AreaCity newModelQuery()
 * @method static Builder|AreaCity newQuery()
 * @method static Builder|AreaCity query()
 * @method static Builder|AreaCity whereCode($value)
 * @method static Builder|AreaCity whereCreatedAt($value)
 * @method static Builder|AreaCity whereId($value)
 * @method static Builder|AreaCity whereName($value)
 * @method static Builder|AreaCity whereProvinceId($value)
 * @method static Builder|AreaCity whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
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
