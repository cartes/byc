<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Seller
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \App\User $user
 */
class Seller extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'role_id', 'name', 'last_name', 'email');
    }
}
