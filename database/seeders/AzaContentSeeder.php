<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AzaContentSeeder extends Seeder
{
    public function run(): void
    {
        // ── SETTINGS ──────────────────────────────────────────────
        $settings = [
            'site_name'          => 'AZA Electromechanical',
            'site_tagline'       => 'Modern State of the Art Solutions',
            'site_email'         => 'info@azamep.com',
            'site_phone'         => '+971 4 339 7219',
            'site_address'       => 'Office 503, Le Solarium Tower, Dubai Silicon Oasis, P.O Box 48466',
            'logo'               => 'assets/aza/logo.jpg',
            'logo_white'         => 'assets/aza/logo-white.png',
            'social_linkedin'    => 'https://www.linkedin.com/',
            'social_facebook'    => 'https://www.facebook.com/',
            'social_twitter'     => 'https://twitter.com/',
            'hero_title_1'       => 'AZA Modern State of the Art Solutions',
            'hero_title_2'       => 'We Create Mega Structures For Better Future',
            'hero_title_3'       => 'Combining Transparency And Structural Integrity',
            'about_title'        => 'Efficiently Count on Most Advanced Technical',
            'about_text'         => 'AZA Electromechanical has the representation from internationally reputed manufacturers and has a wide range of activities and interests. AZA Electromechanical caters to the requirements of Industries like Smart Farms, Industries, Commercial, Engineering Industries, Construction etc. We bring quality products that exceed your expectations, and we have strategic tie-ups with the industry leaders round the globe.',
            'stats_experience'   => '25+',
            'footer_text'        => 'We work with a passion of taking challenges and creating new ones in the electromechanical sector.',
            'cta_title'          => 'Ready to Start Your Project?',
            'cta_text'           => 'Contact us today and let our expert team handle your electromechanical needs.',
            'quote_text'         => 'Adopting the highest standards of quality, AZA Electromechanical Works is competent to provide a wide range of services with the objective of gaining its clients satisfaction.',
            'quote_author'       => 'Eng. Zeyad Al Shammary — Managing Director',
        ];

        foreach ($settings as $key => $value) {
            DB::table('settings')->upsert(
                [['key' => $key, 'value' => $value]],
                ['key'],
                ['value']
            );
        }

        // ── SLIDERS ────────────────────────────────────────────────
        DB::table('sliders')->truncate();

        $sliders = [
            [
                'image'           => 'assets/aza/projects/project-1.jpg',
                'subtitle'        => 'AZA Electromechanical',
                'title'           => 'Modern State of the Art',
                'title_highlight' => 'Solutions',
                'transition'      => 'papercut',
                'sort_order'      => 1,
                'is_active'       => true,
            ],
            [
                'image'           => 'assets/aza/projects/project-4.jpg',
                'subtitle'        => 'Building Excellence',
                'title'           => 'We Create Mega Structures',
                'title_highlight' => 'For Better Future',
                'transition'      => 'papercut',
                'sort_order'      => 2,
                'is_active'       => true,
            ],
            [
                'image'           => 'assets/aza/projects/project-6.jpg',
                'subtitle'        => 'Quality & Integrity',
                'title'           => 'Combining Transparency And',
                'title_highlight' => 'Structural Integrity',
                'transition'      => 'papercut',
                'sort_order'      => 3,
                'is_active'       => true,
            ],
        ];

        DB::table('sliders')->insert($sliders);

        // ── ABOUT SECTION ──────────────────────────────────────────
        DB::table('about_sections')->truncate();
        DB::table('about_sections')->insert([
            'heading'     => 'AZA ELECTROMECHANICAL',
            'subheading'  => 'ABOUT US.',
            'subtext'     => 'Efficiently Count on Most Advanced Technical Solutions',
            'body_text'   => 'AZA Electromechanical has the representation from internationally reputed manufacturers and has a wide range of activities and interests. AZA Electromechanical caters to the requirements of Industries like Smart Farms, Industries, Commercial, Engineering Industries, Construction etc. We bring quality products that exceed your expectations, and we have strategic tie-ups with the industry leaders round the globe.',
            'col1_heading' => 'OUR VISION.',
            'col1_text'   => 'Through its rich resources coupled with the high quality technical and managerial staff, AZA Electromechanical Works recognizes any challenge posed by new projects regardless of the size or complexity of the project with its commitment to competitive prices and compliance to all quality standards.',
            'col2_heading' => 'OUR MISSION.',
            'col2_text'   => 'Adopting the highest standards of quality, AZA Electromechanical Works is competent to provide a wide range of services with the objective of gaining its clients satisfaction. The company undertakes the development of a special concept that would make us a leader in our field at the technological and technical levels.',
            'col3_heading' => 'WHY CHOOSE US.',
            'col3_text'   => 'With over 25 years of experience in the electromechanical sector, we combine fast delivery, quality assurance, and a creative team. Our specialists use the latest methodologies and fast-track plans to accomplish your goals with excellence.',
        ]);

        // About images (ElastiStack)
        DB::table('about_images')->truncate();
        DB::table('about_images')->insert([
            ['image' => 'assets/aza/about/vision.jpg',   'sort_order' => 1],
            ['image' => 'assets/aza/about/mission.jpg',  'sort_order' => 2],
            ['image' => 'assets/aza/projects/project-3.jpg', 'sort_order' => 3],
        ]);

        // ── TEAM ───────────────────────────────────────────────────
        DB::table('team_members')->truncate();
        DB::table('team_members')->insert([
            [
                'name'       => 'Eng. Zeyad Al Shammary',
                'position'   => 'Managing Director',
                'photo'      => 'assets/aza/team/zeyad.png',
                'twitter'    => 'https://www.linkedin.com/',
                'facebook'   => null,
                'github'     => null,
                'googleplus' => null,
                'email'      => 'info@azamep.com',
                'sort_order' => 1,
                'is_active'  => true,
            ],
        ]);

        // ── SERVICES ───────────────────────────────────────────────
        DB::table('services')->truncate();
        DB::table('services')->insert([
            [
                'title'       => 'Commercial',
                'description' => 'Offices, Showroom, Car Parking, Labour Camps, Shopping Centers — we deliver complete electromechanical solutions for all commercial sectors.',
                'icon_image'  => 'assets/aza/services/commercial.jpg',
                'image'       => 'assets/aza/services/commercial.jpg',
                'sort_order'  => 1,
                'is_active'   => true,
            ],
            [
                'title'       => 'Industrials',
                'description' => 'Factories, Cold Stores, Workshops, Warehouses, Logistics — industrial-grade electromechanical systems built for maximum efficiency.',
                'icon_image'  => 'assets/aza/services/industrial.jpg',
                'image'       => 'assets/aza/services/industrial.jpg',
                'sort_order'  => 2,
                'is_active'   => true,
            ],
            [
                'title'       => 'Data Centers',
                'description' => 'We support the center hardware requirements including HV, LV power systems, uninterruptible power supplies (UPS) and complete cooling solutions.',
                'icon_image'  => 'assets/aza/services/data-center.jpg',
                'image'       => 'assets/aza/services/data-center.jpg',
                'sort_order'  => 3,
                'is_active'   => true,
            ],
            [
                'title'       => 'Smart Farms',
                'description' => 'This approach gives farmers tools and strategies to improve yields and sustainability of agricultural operations through smart electromechanical systems.',
                'icon_image'  => 'assets/aza/services/smart-farms.jpg',
                'image'       => 'assets/aza/services/smart-farms.jpg',
                'sort_order'  => 4,
                'is_active'   => true,
            ],
        ]);

        // ── CLIENTS ────────────────────────────────────────────────
        DB::table('clients')->truncate();
        DB::table('clients')->insert([
            ['name' => 'DP World',              'logo' => 'assets/aza/clients/dpworld.png',   'sort_order' => 1, 'is_active' => true],
            ['name' => 'Fly Dubai',             'logo' => 'assets/aza/clients/flydubai.png',  'sort_order' => 2, 'is_active' => true],
            ['name' => 'SNOC',                  'logo' => 'assets/aza/clients/snoc.png',       'sort_order' => 3, 'is_active' => true],
            ['name' => 'TECOM Group',           'logo' => 'assets/aza/clients/tecom.png',      'sort_order' => 4, 'is_active' => true],
            ['name' => 'Al Futtaim',            'logo' => 'assets/aza/clients/alfuttaim.png', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'University of Sharjah', 'logo' => 'assets/aza/clients/uos.png',       'sort_order' => 6, 'is_active' => true],
        ]);

        // ── FUN FACTS ──────────────────────────────────────────────
        DB::table('fun_facts')->truncate();
        DB::table('fun_facts')->insert([
            ['label' => 'Years of Experience', 'count' => 25, 'sort_order' => 1],
            ['label' => 'Projects Completed',  'count' => 150, 'sort_order' => 2],
            ['label' => 'Happy Clients',        'count' => 80,  'sort_order' => 3],
            ['label' => 'Team Members',         'count' => 50,  'sort_order' => 4],
        ]);

        // ── TESTIMONIALS ───────────────────────────────────────────
        DB::table('testimonials')->truncate();
        DB::table('testimonials')->insert([
            [
                'content'    => 'AZA Electromechanical delivered our data center project on time and to the highest quality standards. Their team is professional and highly skilled.',
                'author'     => 'Ahmed Al Mansouri',
                'company'    => 'DP World',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'content'    => 'Excellent service and outstanding professionalism throughout our smart farm project. We highly recommend AZA for any electromechanical work.',
                'author'     => 'Sarah Johnson',
                'company'    => 'TECOM Group',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'content'    => 'The team at AZA exceeded our expectations. Their attention to detail and commitment to quality is second to none in the industry.',
                'author'     => 'Mohammed Al Rashidi',
                'company'    => 'SNOC',
                'sort_order' => 3,
                'is_active'  => true,
            ],
        ]);

        // ── PORTFOLIO / PROJECTS ───────────────────────────────────
        DB::table('portfolio_images')->truncate();
        DB::table('portfolio_items')->truncate();

        $projects = [
            ['title' => 'Proposed G+Future Mezzanine Workshops at DMC Dubai',                                          'image' => 'assets/aza/projects/project-1.jpg', 'category' => 'Industrials'],
            ['title' => 'Elite Sky Warehouse Buildings at DIC',                                                        'image' => 'assets/aza/projects/project-2.jpg', 'category' => 'Industrials'],
            ['title' => 'DMC Supply and Installation Works at Showroom',                                               'image' => 'assets/aza/projects/project-3.jpg', 'category' => 'Commercial'],
            ['title' => 'TECOM Enhancement of Building Elevation in Dubai Internet City Phase 1B',                     'image' => 'assets/aza/projects/project-4.jpg', 'category' => 'Commercial'],
            ['title' => 'Proposed Office Workshop and Car Truck Washing Facilities at Dubai Industrial City',          'image' => 'assets/aza/projects/project-5.jpg', 'category' => 'Industrials'],
            ['title' => 'Design and Build Proposed Warehouse at Al Qouz Industrial 3rd',                              'image' => 'assets/aza/projects/project-6.jpg', 'category' => 'Industrials'],
            ['title' => 'Proposed Warehouse and 4 Service Block Sharjah',                                             'image' => 'assets/aza/projects/project-7.jpg', 'category' => 'Industrials'],
            ['title' => 'Advanced Industrial Facility at Dubai Investment Park',                                       'image' => 'assets/aza/projects/project-8.jpg', 'category' => 'Industrials'],
            ['title' => 'Modern Commercial Complex Electromechanical Works',                                           'image' => 'assets/aza/projects/project-9.jpg', 'category' => 'Commercial'],
        ];

        foreach ($projects as $i => $p) {
            DB::table('portfolio_items')->insert([
                'title'             => $p['title'],
                'slug'              => Str::slug($p['title']) . '-' . ($i + 1),
                'image'             => $p['image'],
                'subtitle'          => $p['category'],
                'short_description' => 'Electromechanical works — ' . $p['category'],
                'description'       => 'Complete electromechanical supply and installation works for ' . $p['title'] . '. AZA Electromechanical delivered this project with full compliance to quality standards and on-schedule completion.',
                'link_type'         => 'lightbox',
                'is_featured'       => $i < 6,
                'is_active'         => true,
                'sort_order'        => $i + 1,
            ]);
        }

        // ── PAGES ──────────────────────────────────────────────────
        $aboutContent = <<<HTML
<section class="aza-about-page">
    <div class="row">
        <div class="col-md-6">
            <h2>Our Vision</h2>
            <p>Through its rich resources coupled with the high quality technical and managerial staff, AZA Electromechanical Works recognizes any challenge posed by new projects regardless of the size or complexity of the project with its commitment to competitive prices and compliance to all quality standards.</p>
            <img src="/assets/aza/about/vision.jpg" class="img-fluid" alt="Vision">
        </div>
        <div class="col-md-6">
            <h2>Our Mission</h2>
            <p>Adopting the highest standards of quality, AZA Electromechanical Works is competent to provide a wide range of services with the objective of gaining its clients satisfaction. The company undertakes the development of a special concept that would make us a leader in our field at the technological and technical levels.</p>
            <img src="/assets/aza/about/mission.jpg" class="img-fluid" alt="Mission">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Managing Director</h2>
            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="/assets/aza/team/zeyad.png" class="img-fluid" alt="Eng. Zeyad Al Shammary">
                </div>
                <div class="col-md-9">
                    <h3>Eng. Zeyad Al Shammary</h3>
                    <h5>Managing Director</h5>
                    <p>Visionary executive with +25 years of proven success in spearheading leading companies dealing with complex Electromechanical systems. Adept at fostering collaborative environments, navigating strategic partnerships, and translating cutting-edge technologies into tangible solutions.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Why Choose Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Fast And Warranty Work</h4>
                    <p>We using the latest methodologies with fast tracks plans with best quality assurance to accomplish your dream goals.</p>
                </div>
                <div class="col-md-6">
                    <h4>Creative Team Members</h4>
                    <p>Our team are very selective by a smart system developed with many levels of testing and planning.</p>
                </div>
            </div>
        </div>
    </div>
</section>
HTML;

        $servicesContent = <<<HTML
<section class="aza-services-page">
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="/assets/aza/services/commercial.jpg" class="img-fluid" alt="Commercial">
            <h3>Commercial</h3>
            <p>Offices, Showroom, Car Parking, Labour Camps, Shopping Centers — complete electromechanical solutions for all commercial sectors.</p>
        </div>
        <div class="col-md-6 mb-4">
            <img src="/assets/aza/services/industrial.jpg" class="img-fluid" alt="Industrials">
            <h3>Industrials</h3>
            <p>Factories, Cold Stores, Workshops, Warehouses, Logistics — industrial-grade systems built for maximum efficiency.</p>
        </div>
        <div class="col-md-6 mb-4">
            <img src="/assets/aza/services/data-center.jpg" class="img-fluid" alt="Data Centers">
            <h3>Data Centers</h3>
            <p>HV, LV power systems, uninterruptible power supplies (UPS) and complete cooling solutions for data center environments.</p>
        </div>
        <div class="col-md-6 mb-4">
            <img src="/assets/aza/services/smart-farms.jpg" class="img-fluid" alt="Smart Farms">
            <h3>Smart Farms</h3>
            <p>Tools and strategies to improve yields and sustainability of agricultural operations through smart electromechanical systems.</p>
        </div>
    </div>
</section>
HTML;

        $pages = [
            [
                'title'            => 'About AZA Electromechanical',
                'slug'             => 'about',
                'content'          => $aboutContent,
                'meta_title'       => 'About Us — AZA Electromechanical',
                'meta_description' => 'Learn about AZA Electromechanical, our vision, mission, and the team behind 25+ years of excellence.',
                'hero_image'       => 'assets/aza/about/vision.jpg',
                'is_published'     => true,
            ],
            [
                'title'            => 'Our Services',
                'slug'             => 'services',
                'content'          => $servicesContent,
                'meta_title'       => 'Services — AZA Electromechanical',
                'meta_description' => 'Commercial, Industrial, Data Centers and Smart Farm electromechanical services by AZA.',
                'hero_image'       => 'assets/aza/services/industrial.jpg',
                'is_published'     => true,
            ],
            [
                'title'            => 'Our Projects',
                'slug'             => 'projects',
                'content'          => '<p>Browse our portfolio of completed electromechanical projects across the UAE and the region.</p>',
                'meta_title'       => 'Projects — AZA Electromechanical',
                'meta_description' => 'Explore AZA Electromechanical completed projects across commercial, industrial, and data center sectors.',
                'hero_image'       => 'assets/aza/projects/project-1.jpg',
                'is_published'     => true,
            ],
            [
                'title'            => 'Contact Us',
                'slug'             => 'contact',
                'content'          => '<p>Get in touch with the AZA Electromechanical team. We are here to help with all your electromechanical needs.</p><p><strong>Phone:</strong> +971 4 339 7219</p><p><strong>Email:</strong> info@azamep.com</p><p><strong>Address:</strong> Office 503, Le Solarium Tower, Dubai Silicon Oasis, P.O Box 48466</p>',
                'meta_title'       => 'Contact — AZA Electromechanical',
                'meta_description' => 'Contact AZA Electromechanical for your electromechanical project needs in UAE.',
                'hero_image'       => null,
                'is_published'     => true,
            ],
        ];

        foreach ($pages as $page) {
            DB::table('pages')->upsert(
                [$page],
                ['slug'],
                ['title', 'content', 'meta_title', 'meta_description', 'hero_image', 'is_published']
            );
        }
    }
}
