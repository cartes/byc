<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Commune
 *
 * @property int $id
 * @property string $name
 * @property int $region_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Commune whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Commune extends Model
{
    //
}
