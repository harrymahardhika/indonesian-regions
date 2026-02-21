<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Models;

use HarryM\IndonesianRegions\Database\Factories\AreaSubdistrictFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * HarryM\IndonesianRegions\Models\AreaSubdistrict.
 *
 *
 * @method static AreaSubdistrictFactory  factory($count = null, $state = [])
 * @method static Builder|AreaSubdistrict newModelQuery()
 * @method static Builder|AreaSubdistrict newQuery()
 * @method static Builder|AreaSubdistrict query()
 * @method static Builder|AreaSubdistrict whereCode($value)
 * @method static Builder|AreaSubdistrict whereCreatedAt($value)
 * @method static Builder|AreaSubdistrict whereDistrictId($value)
 * @method static Builder|AreaSubdistrict whereId($value)
 * @method static Builder|AreaSubdistrict whereName($value)
 * @method static Builder|AreaSubdistrict whereUpdatedAt($value)
 *
 * @mixin Model
 *
 * @property int          $id
 * @property int          $district_id
 * @property string       $code
 * @property string       $name
 * @property Carbon|null  $created_at
 * @property Carbon|null  $updated_at
 * @property AreaDistrict $district
 */
class AreaSubdistrict extends Model
{
    /** @use HasFactory<AreaSubdistrictFactory> */
    use HasFactory;

    /**
     * @return BelongsTo<AreaDistrict, $this>
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(AreaDistrict::class, 'district_id');
    }

    protected static function newFactory(): AreaSubdistrictFactory
    {
        return AreaSubdistrictFactory::new();
    }
}
