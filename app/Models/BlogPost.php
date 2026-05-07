<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'type', 'featured_image', 'video_url',
        'audio_file', 'quote_text', 'quote_author',
        'excerpt', 'content', 'icon_code',
        'published_at', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(BlogImage::class)->orderBy('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->where('published_at', '<=', now())
                     ->latest('published_at');
    }

    public function getIconHtmlAttribute(): string
    {
        $code = $this->icon_code ?? 'f040';
        return '&#x' . $code . ';';
    }
}
