<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaProvinceFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Concatenate\IndonesianRegions\Models\AreaProvince.
 *
 * @property int                                                                                           $id
 * @property string                                                                                        $code
 * @property string                                                                                        $name
 * @property \Illuminate\Support\Carbon|null                                                               $created_at
 * @property \Illuminate\Support\Carbon|null                                                               $updated_at
 * @property \Illuminate\Database\Eloquent\Collection<int, \Concatenate\IndonesianRegions\Models\AreaCity> $cities
 * @property int|null                                                                                      $cities_count
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
 * @mixin \Eloquent
 */
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
