<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Buyer
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereUserId($value)
 * @mixin \Eloquent
 */
class Buyer extends Model
{
    //
}
