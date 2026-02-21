<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Models;

use HarryM\IndonesianRegions\Database\Factories\AreaCityFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * HarryM\IndonesianRegions\Models\AreaCity.
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
 * @mixin Model
 *
 * @property int                           $id
 * @property int                           $province_id
 * @property string                        $code
 * @property string                        $name
 * @property Carbon|null                   $created_at
 * @property Carbon|null                   $updated_at
 * @property Collection<int, AreaDistrict> $districts
 * @property int|null                      $districts_count
 * @property AreaProvince                  $province
 */
class AreaCity extends Model
{
    /** @use HasFactory<AreaCityFactory> */
    use HasFactory;

    /**
     * @return BelongsTo<AreaProvince, $this>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(AreaProvince::class, 'province_id');
    }

    /**
     * @return HasMany<AreaDistrict, $this>
     */
    public function districts(): HasMany
    {
        return $this->hasMany(AreaDistrict::class, 'city_id');
    }

    protected static function newFactory(): AreaCityFactory
    {
        return AreaCityFactory::new();
    }
}
