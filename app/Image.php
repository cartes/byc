<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'title',
        'post_id',
        'path',
        'mime_type',
        'alt',
        'description'
    ];

    public function pathAttachment() {
        return "/images/" . $this->path;
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
