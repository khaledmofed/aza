<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::active()->get();

        return view('frontend.portfolio.index', compact('items'));
    }

    public function show(string $slug)
    {
        $item = PortfolioItem::active()->with('images')->where('slug', $slug)->firstOrFail();
        $prev = PortfolioItem::active()->where('id', '<', $item->id)->orderBy('id', 'desc')->first();
        $next = PortfolioItem::active()->where('id', '>', $item->id)->orderBy('id', 'asc')->first();

        return view('frontend.portfolio.show', compact('item', 'prev', 'next'));
    }
}
