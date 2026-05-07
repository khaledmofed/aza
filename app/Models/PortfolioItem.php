<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title', 'slug', 'image', 'subtitle', 'short_description',
        'description', 'details', 'client', 'project_date', 'category', 'website_url',
        'link_type', 'external_url',
        'is_featured', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class)->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getLinkAttribute(): string
    {
        return match ($this->link_type) {
            'page'     => route('portfolio.show', $this->slug),
            'lightbox' => asset('storage/' . $this->image),
            'external' => $this->external_url ?? '#',
            default    => '#',
        };
    }

    public function getLinkClassAttribute(): string
    {
        return $this->link_type === 'lightbox' ? 'photostack-img fancybox-effects-d' : 'photostack-img';
    }
}
