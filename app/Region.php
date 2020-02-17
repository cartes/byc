<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Region
 *
 * @property int $id
 * @property string $name
 * @property string $ordinal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereOrdinal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $post
 * @property-read int|null $post_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UserMeta[] $meta
 * @property-read int|null $meta_count
 */
class Region extends Model
{
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function meta()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }

}
