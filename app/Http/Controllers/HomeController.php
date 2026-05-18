<?php

namespace App\Http\Controllers;

use App\Models\AboutImage;
use App\Models\AboutSection;
use App\Models\BlogPost;
use App\Models\Client;
use App\Models\FunFact;
use App\Models\PortfolioItem;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    // Cache TTL in seconds (10 minutes)
    private const TTL = 600;

    public function index()
    {
        $data = Cache::remember('home.page.data', self::TTL, function () {
            return [
                'sliders'      => Slider::active()->get(),
                'about'        => AboutSection::instance(),
                'aboutImages'  => AboutImage::ordered()->get(),
                'team'         => TeamMember::active()->get(),
                'portfolio'    => PortfolioItem::active()->get(),
                'services'     => Service::active()->get(),
                'testimonials' => Testimonial::active()->get(),
                'facts'        => FunFact::ordered()->get(),
                'clients'      => Client::active()->get(),
                'blogPosts'    => BlogPost::published()->with('images')->take(6)->get(),
            ];
        });

        return view('frontend.home', $data);
    }

    // Call this from admin controllers after any content update
    public static function clearCache(): void
    {
        Cache::forget('home.page.data');
    }
}
