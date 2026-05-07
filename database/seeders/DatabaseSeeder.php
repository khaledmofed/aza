<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\FunFact;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@theway.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Default site settings
        $defaults = [
            'site_name'        => 'The Way Studio',
            'site_email'       => 'office@theway.com',
            'site_phone'       => '+1 234 567 890',
            'site_address'     => '123 Creative Street, City, Country',
            'site_website'     => 'https://www.theway.com',
            'footer_copyright' => 'Copyright © ' . date('Y') . ' The Way Studio',
            'quote_text'       => 'Far and away the best prize that life has to offer is the chance to work hard at work worth doing.',
            'quote_author'     => 'Theodore Roosevelt',
            'cta_text'         => 'ARE YOU READY TO START A CONVERSATION?',
            'facts_heading'    => 'SOME FUN FACTS',
            'social_twitter'   => '',
            'social_facebook'  => '',
            'social_github'    => '',
            'social_googleplus'=> '',
        ];

        foreach ($defaults as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }

        // About section
        AboutSection::instance();

        // Fun facts
        $facts = [
            ['label' => 'Clients', 'count' => 87, 'sort_order' => 1],
            ['label' => 'Awards',  'count' => 25, 'sort_order' => 2],
            ['label' => 'Projects','count' => 68, 'sort_order' => 3],
            ['label' => 'Mails',   'count' => 46, 'sort_order' => 4],
        ];
        foreach ($facts as $fact) {
            FunFact::firstOrCreate(['label' => $fact['label']], $fact);
        }

        // Default services
        $services = [
            ['title' => 'Networking',        'description' => 'We build robust, secure, and scalable network solutions for businesses of all sizes.', 'sort_order' => 1],
            ['title' => 'Analytics',         'description' => 'Data-driven insights to help your business grow smarter and faster.', 'sort_order' => 2],
            ['title' => 'Growth Statistics', 'description' => 'We track and optimize your growth metrics to keep you ahead of the competition.', 'sort_order' => 3],
            ['title' => 'Development',       'description' => 'Full-stack web and mobile development tailored to your business needs.', 'sort_order' => 4],
        ];
        foreach ($services as $service) {
            Service::firstOrCreate(['title' => $service['title']], $service + ['is_active' => true]);
        }

        // Default testimonials
        $testimonials = [
            ['content' => 'Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.', 'author' => 'John Doe', 'company' => 'ThemeForest', 'sort_order' => 1],
            ['content' => 'In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.', 'author' => 'Mike Smith', 'company' => 'CodeCanyon', 'sort_order' => 2],
            ['content' => 'Duis in nibh id lorem pulvinar adipiscing. Nulla odio elit, rutrum at convallis in, rhoncus ac urna.', 'author' => 'Sarah', 'company' => 'GraphicRiver', 'sort_order' => 3],
        ];
        foreach ($testimonials as $testimonial) {
            Testimonial::firstOrCreate(['author' => $testimonial['author']], $testimonial + ['is_active' => true]);
        }
    }
}
