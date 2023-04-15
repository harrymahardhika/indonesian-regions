<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\Models;

use Concatenate\IndonesianRegions\Database\Factories\AreaSubdistrictFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Concatenate\IndonesianRegions\Models\AreaSubdistrict.
 *
 * @property int                                                $id
 * @property int                                                $district_id
 * @property string                                             $code
 * @property string                                             $name
 * @property \Illuminate\Support\Carbon|null                    $created_at
 * @property \Illuminate\Support\Carbon|null                    $updated_at
 * @property \Concatenate\IndonesianRegions\Models\AreaDistrict $district
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
 * @mixin \Eloquent
 */
class AreaSubdistrict extends Model
{
    use HasFactory;

    protected static function newFactory(): AreaSubdistrictFactory
    {
        return AreaSubdistrictFactory::new();
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(AreaDistrict::class, 'district_id');
    }
}
