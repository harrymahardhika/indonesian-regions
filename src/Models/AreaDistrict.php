<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Models;

use HarryM\IndonesianRegions\Database\Factories\AreaDistrictFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * HarryM\IndonesianRegions\Models\AreaDistrict.
 *
 *
 * @method static AreaDistrictFactory  factory($count = null, $state = [])
 * @method static Builder|AreaDistrict newModelQuery()
 * @method static Builder|AreaDistrict newQuery()
 * @method static Builder|AreaDistrict query()
 * @method static Builder|AreaDistrict whereCityId($value)
 * @method static Builder|AreaDistrict whereCode($value)
 * @method static Builder|AreaDistrict whereCreatedAt($value)
 * @method static Builder|AreaDistrict whereId($value)
 * @method static Builder|AreaDistrict whereName($value)
 * @method static Builder|AreaDistrict whereUpdatedAt($value)
 *
 * @mixin Model
 *
 * @property int         $id
 * @property int         $city_id
 * @property string      $code
 * @property string      $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property AreaCity    $city
 */
class AreaDistrict extends Model
{
    /** @use HasFactory<AreaDistrictFactory> */
    use HasFactory;

    /**
     * @return BelongsTo<AreaCity, $this>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(AreaCity::class, 'city_id');
    }

    /**
     * @return HasMany<AreaSubdistrict, $this>
     */
    public function subdistricts(): HasMany
    {
        return $this->hasMany(AreaSubdistrict::class, 'district_id');
    }

    protected static function newFactory(): AreaDistrictFactory
    {
        return AreaDistrictFactory::new();
    }
}
