<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Models;

use HarryM\IndonesianRegions\Database\Factories\AreaProvinceFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * HarryM\IndonesianRegions\Models\AreaProvince.
 *
 *
 * @method static AreaProvinceFactory  factory($count = null, $state = [])
 * @method static Builder|AreaProvince newModelQuery()
 * @method static Builder|AreaProvince newQuery()
 * @method static Builder|AreaProvince query()
 * @method static Builder|AreaProvince whereCode($value)
 * @method static Builder|AreaProvince whereCreatedAt($value)
 * @method static Builder|AreaProvince whereId($value)
 * @method static Builder|AreaProvince whereName($value)
 * @method static Builder|AreaProvince whereUpdatedAt($value)
 *
 * @mixin Model
 *
 * @property int                       $id
 * @property string                    $code
 * @property string                    $name
 * @property Carbon|null               $created_at
 * @property Carbon|null               $updated_at
 * @property Collection<int, AreaCity> $cities
 * @property int|null                  $cities_count
 */
class AreaProvince extends Model
{
    /** @use HasFactory<AreaProvinceFactory> */
    use HasFactory;

    /**
     * @return HasMany<AreaCity, $this>
     */
    public function cities(): HasMany
    {
        return $this->hasMany(AreaCity::class, 'province_id');
    }

    protected static function newFactory(): AreaProvinceFactory
    {
        return AreaProvinceFactory::new();
    }
}
