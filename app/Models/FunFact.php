<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FunFact extends Model
{
    protected $fillable = ['label', 'count', 'sort_order'];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
