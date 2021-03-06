<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserMeta
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $rut
 * @property string|null $gender
 * @property string|null $address
 * @property int|null $commune_id
 * @property int|null $region_id
 * @property string|null $city
 * @property string|null $province
 * @property string|null $birthday
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereCommuneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereRut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMeta whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 * @property-read \App\Commune|null $commune
 * @property-read \App\Region|null $region
 */
class UserMeta extends Model
{
    protected $fillable = [
        'user_id',
        'rut',
        'gender',
        'address',
        'commune_id',
        'region_id',
        'city',
        'province',
        'birthday'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

}
