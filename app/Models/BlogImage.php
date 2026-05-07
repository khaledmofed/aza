<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    protected $fillable = ['blog_post_id', 'image', 'sort_order'];

    public function post()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
