<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaDistrictFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Concatenate\IndonesianRegions\Models\AreaDistrict.
 *
 * @property int                                            $id
 * @property int                                            $city_id
 * @property string                                         $code
 * @property string                                         $name
 * @property \Illuminate\Support\Carbon|null                $created_at
 * @property \Illuminate\Support\Carbon|null                $updated_at
 * @property \Concatenate\IndonesianRegions\Models\AreaCity $city
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
 * @mixin \Eloquent
 */
class AreaDistrict extends Model
{
    use HasFactory;

    protected static function newFactory(): AreaDistrictFactory
    {
        return AreaDistrictFactory::new();
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(AreaCity::class, 'city_id');
    }
}
