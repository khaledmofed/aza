<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    protected $fillable = ['portfolio_item_id', 'image', 'sort_order'];

    public function item()
    {
        return $this->belongsTo(PortfolioItem::class);
    }
}
