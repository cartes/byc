<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Post
 *
 * @property int $id
 * @property int $seller_id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string|null $picture
 * @property string $status
 * @property int $previous_published
 * @property string $price
 * @property int|null $commune_id
 * @property int|null $region_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCommuneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePreviousPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Buyer[] $buyers
 * @property-read int|null $buyers_count
 * @property-read \App\Category $category
 * @property-read \App\Commune|null $commune
 * @property-read \App\Region|null $region
 * @property-read \App\Seller $seller
 * @property-read mixed $date
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Post onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Post withoutTrashed()
 */
class Post extends Model
{
    use SoftDeletes;

    const PUBLISHED = 1;
    const PENDING = 2;
    const EXPIRED = 3;

    protected $fillable = [
        'seller_id',
        'category_id',
        'name',
        'slug',
        'description',
        'status',
        'previous_published',
        'price',
        'commune_id',
        'region_id'
    ];

    public static function boot()
    {
        parent::boot();

        static::saved(function (Post $post) {
            if (!\App::runningInConsole()) {
                if (request('file')) {
                    foreach (request('file') as $file) {
                        $path = $file->store('post');
                        Image::create([
                            "post_id" => $post->id,
                            "path" => $path,
                            "title" => $file->getClientOriginalName(),
                            "mime_type" => $file->getClientMimeType()
                        ]);
                    }
                }
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function buyers()
    {
        return $this->belongsToMany(Buyer::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function featured()
    {
        return $this->hasOne(Image::class);
    }

    public function getDateAttribute()
    {
        $attr = Carbon::parse($this->attributes['created_at']);

        return $attr->isToday() ? 'Hoy, ' . $attr->diffForHumans() : $attr->diffForHumans();
    }

}
