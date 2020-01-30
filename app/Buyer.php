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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \App\User $user
 */
class Buyer extends Model
{
    protected $fillable = ['user_id', 'title'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'role_id', 'name', 'last_name', 'email');
    }
}
