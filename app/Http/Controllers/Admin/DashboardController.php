<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\PortfolioItem;
use App\Models\Slider;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sliders'        => Slider::count(),
            'team'           => TeamMember::count(),
            'portfolio'      => PortfolioItem::count(),
            'blog'           => BlogPost::count(),
            'messages'       => ContactMessage::count(),
            'unread_messages'=> ContactMessage::unread()->count(),
        ];

        $latestMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('stats', 'latestMessages'));
    }
}
