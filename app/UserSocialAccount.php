<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserSocialAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_uii
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserSocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserSocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserSocialAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserSocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserSocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserSocialAccount whereProviderUii($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserSocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
class UserSocialAccount extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
