<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'title',
        'path',
        'mime_type',
        'alt',
        'description'
    ];

    public function posts() {
        return $this->belongsTo(Post::class);
    }
}
