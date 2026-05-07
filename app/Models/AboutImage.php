<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    protected $fillable = ['image', 'sort_order'];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
