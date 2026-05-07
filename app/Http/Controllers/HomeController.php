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

class HomeController extends Controller
{
    public function index()
    {
        $sliders      = Slider::active()->get();
        $about        = AboutSection::instance();
        $aboutImages  = AboutImage::ordered()->get();
        $team         = TeamMember::active()->get();
        $portfolio    = PortfolioItem::active()->get();
        $services     = Service::active()->get();
        $testimonials = Testimonial::active()->get();
        $facts        = FunFact::ordered()->get();
        $clients      = Client::active()->get();
        $blogPosts    = BlogPost::published()->with('images')->take(6)->get();

        return view('frontend.home', compact(
            'sliders', 'about', 'aboutImages', 'team',
            'portfolio', 'services', 'testimonials', 'facts', 'clients', 'blogPosts'
        ));
    }
}
