<?php

namespace Database\Seeders;

use App\Models\PortfolioImage;
use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AzaPortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'PROPOSED G+FUTURE MEZZANINE WORKSHOPS ON PLOT NO. W4000A & W4000B AT DMC, DUBAI',
                'client'      => 'M/S DP WORLD / DMC',
                'category'    => 'Industrial / Commercial MEP Works',
                'description' => 'Mechanical, electrical, and plumbing (MEP) infrastructure project encompassing design, supply, installation, testing, commissioning, and defects liability period services.',
                'details'     => 'DESIGN, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF MEP WORKS. Consultant: M/S YAGHMOUR. Location: Dubai.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/7-3.jpg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/07/7-4.jpg',
                ],
            ],
            [
                'title'       => 'ELITE SKY WAREHOUSE BUILDINGS AT DIC',
                'client'      => 'M/S TECOM INVESTMENT FZ L.L.C.',
                'category'    => 'Industrial / Warehouse Construction',
                'description' => 'MEP design, supply, installation, testing, commissioning and defects liability period services for warehouse buildings at Dubai Industrial City.',
                'details'     => 'DESIGN, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF MEP WORKS. Location: Dubai Industrial City.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/AZA109-1-1.jpg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/11/1-1.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/4-2.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/5-3.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/6-2.jpg',
                ],
            ],
            [
                'title'       => 'DMC - SUPPLY AND INSTALLATION WORKS AT SHOWROOM',
                'client'      => 'M/S DP WORLD',
                'category'    => 'MEP Works',
                'description' => 'Supply, installation and testing and commissioning of related MEP works & DLP of all MEP works.',
                'details'     => 'SUPPLY, INSTALLATION, TESTING & COMMISSIONING OF RELATED MEP WORKS & DLP. Location: Dubai.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/10-300x261-1.jpg',
                'gallery'     => [],
            ],
            [
                'title'       => 'TECOM - ENHANCEMENT OF BUILDING ELEVATION IN DUBAI INTERNET CITY (PHASE 1B)',
                'client'      => 'M/S TECOM INVESTMENT FZ L.L.C.',
                'category'    => 'Commercial / MEP Construction',
                'description' => 'Supply, installation, testing, commissioning of MEP works and design life cycle management of all MEP systems for building elevation enhancement.',
                'details'     => 'SUPPLY, INSTALLATION, TESTING & COMMISSIONING OF MEP WORKS & DESIGN LIFE CYCLE MANAGEMENT. Location: Dubai Internet City.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/1-4-1.jpg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/11/8-2.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/3-1.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/4-1.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/5-2.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/6-1.jpg',
                ],
            ],
            [
                'title'       => 'PROPOSED OFFICE (G+M) WORKSHOP & CAR/TRUCK WASHING FACILITIES AT PLOT NO. 5330394, DUBAI INDUSTRIAL CITY',
                'client'      => 'M/S IPT ENERGY POWER TRADING LLC',
                'category'    => 'Industrial / Automotive Facilities',
                'description' => 'Supply, installation, testing, and commissioning of MEP works along with design and layout documentation of all MEP systems.',
                'details'     => 'SUPPLY, INSTALLATION, TESTING & COMMISSIONING OF MEP WORKS & DESIGN DOCUMENTATION. Consultant: M/S NASSA TEAM ENGINEERING CONSULTANCY. Location: Dubai Industrial City.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/2-1-768x432-1.jpg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/11/1.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/3.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/4.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/5.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/8-1.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/9.jpg',
                ],
            ],
            [
                'title'       => 'DESIGN AND BUILD OF PROPOSED WAREHOUSE AND ASSOCIATED WORKS AT PLOT NO. 3688511, AL QOUZ INDUSTRIAL 3RD',
                'client'      => 'M/S A & M INVESTMENT L.L.C.',
                'category'    => 'Industrial / Warehouse Construction',
                'description' => 'Design, supply, installation, testing & commissioning & DLP of MEP works for warehouse and associated facilities.',
                'details'     => 'DESIGN, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF MEP WORKS. Consultant: M/S ZNERA SPACE LAB-FZ CONSULTANT. Location: Al Qouz Industrial 3rd, Dubai.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/9-1-1.jpg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/11/7.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/8.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/10.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/12.jpg',
                ],
            ],
            [
                'title'       => 'PROPOSED WAREHOUSE (G+M) & 4 SERVICE BLOCK — SHARJAH RESEARCH TECHNOLOGY AND INNOVATION PARK',
                'client'      => 'M/S SHARJAH RESEARCH TECHNOLOGY AND INNOVATION PARK',
                'category'    => 'Industrial / Warehouse Construction',
                'description' => 'Design verification, supply, installation, testing, commissioning & DLP of all MEP works for warehouse and service block facilities.',
                'details'     => 'DESIGN VERIFICATION, SUPPLY, INSTALLATION, TESTING, COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S ATRIUM ARCHITECTURAL & ENGINEERING CONSULTANCY. Location: Sharjah.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/4.-2025-06-10-at-6.39.43-PM-4.jpeg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/07/1.-2025-06-10-at-6.39.43-PM-1-1.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/2.-2025-06-10-at-6.39.43-PM-2.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/3.-2025-06-10-at-6.39.43-PM-3.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/5.-2025-06-10-at-6.39.43-PM.jpeg',
                ],
            ],
            [
                'title'       => 'DESIGN & REFURBISHMENT OF AL FUTTAIM TOYOTA FACILITY LOCATED E 11',
                'client'      => 'M/S AL-FUTTAIM AUTO GROUP REAL ESTATE',
                'category'    => 'Commercial / Automotive Facility',
                'description' => 'Design modification, supply, installation, testing, commissioning, and DLP of all MEP works for a Toyota facility refurbishment project.',
                'details'     => 'DESIGN MODIFICATION, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S CAPITAL ENGINEERING CONSULTANCY. Location: Ras Al Khaimah.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/7-300x168-1.jpg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/11/0b557641-fe1a-4e7a-a4c8-a92756341f9c.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/4ad744be-2866-41b3-987b-f056408b8a25.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/5caf63ce-e94e-41df-b854-699e3b58fc23.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/5e701785-6922-4887-9da8-3d6f246f6031.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/35bd6845-9f89-4219-a1a5-e4466a1ae278.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/219cc4f9-8892-4597-a270-e95da6f75ce9.jpg',
                    'https://azamep.com/wp-content/uploads/2025/11/673102ea-d314-4508-98da-0a3c20a74509.jpg',
                ],
            ],
            [
                'title'       => 'CITY CENTER ZAHIA TIER 2 AUTO CENTER',
                'client'      => 'M/S AL-FUTTAIM AUTO CENTERS AUTOEQUIP',
                'category'    => 'Commercial / Auto Center',
                'description' => 'Design verification, supply, installation, testing, commissioning and defects liability period management of all MEP systems.',
                'details'     => 'DESIGN VERIFICATION, SUPPLY, INSTALLATION, TESTING, COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S CAPITAL ENGINEERING CONSULTANCY. Location: Sharjah.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/8.-2025-06-10-at-5.21.21-PM-2.jpeg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/07/4.-2025-06-10-at-5.21.20-PM-1.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/10.-2025-06-10-at-5.21.22-PM-1.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/11.-2025-06-10-at-5.21.22-PM-2.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/12.-2025-06-10-at-5.21.22-PM.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/16.-2025-06-10-at-5.21.24-PM.jpeg',
                ],
            ],
            [
                'title'       => 'CITY CENTRE MIRDIF TIER 2 AUTO CENTER',
                'client'      => 'M/S AL FUTTAIM AUTO CENTERS AUTOEQUIP',
                'category'    => 'Commercial / Auto Center',
                'description' => 'Design verification, supply, installation, testing, commissioning & DLP of all MEP works for auto center facilities.',
                'details'     => 'DESIGN VERIFICATION, SUPPLY, INSTALLATION, TESTING, COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S CAPITAL ENGINEERING CONSULTANCY. Location: Mirdif, Dubai.',
                'cover'       => 'https://azamep.com/wp-content/uploads/2025/07/6.-2025-06-10-at-6.47.48-PM-1.jpeg',
                'gallery'     => [
                    'https://azamep.com/wp-content/uploads/2025/07/12.-2025-06-10-at-6.47.50-PM.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/9.-2025-06-10-at-6.47.49-PM-1.jpeg',
                    'https://azamep.com/wp-content/uploads/2025/07/10.2025-06-10-at-6.47.49-PM-2.jpeg',
                ],
            ],
        ];

        foreach ($projects as $i => $data) {
            $this->command->info("Seeding: {$data['title']}");

            // Download cover image
            $coverPath = $this->downloadImage($data['cover'], 'portfolio');
            if (!$coverPath) {
                $this->command->warn("  ⚠ Cover image download failed, skipping project.");
                continue;
            }

            $item = PortfolioItem::create([
                'title'             => $data['title'],
                'slug'              => Str::slug($data['title']),
                'image'             => $coverPath,
                'description'       => $data['description'],
                'details'           => $data['details'],
                'client'            => $data['client'],
                'category'          => $data['category'],
                'link_type'         => 'page',
                'is_featured'       => true,
                'is_active'         => true,
                'sort_order'        => $i,
            ]);

            foreach ($data['gallery'] as $j => $imgUrl) {
                $galleryPath = $this->downloadImage($imgUrl, 'portfolio/gallery');
                if ($galleryPath) {
                    PortfolioImage::create([
                        'portfolio_item_id' => $item->id,
                        'image'             => $galleryPath,
                        'sort_order'        => $j,
                    ]);
                }
            }

            $this->command->info("  ✓ Done — {$item->images()->count()} gallery images.");
        }
    }

    private function downloadImage(string $url, string $folder): ?string
    {
        try {
            $context = stream_context_create([
                'http' => [
                    'timeout'         => 30,
                    'follow_location' => true,
                    'user_agent'      => 'Mozilla/5.0',
                ],
                'ssl' => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]);

            $contents = @file_get_contents($url, false, $context);
            if ($contents === false) {
                $this->command->warn("  ⚠ Failed to fetch: $url");
                return null;
            }

            $ext      = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
            $ext      = strtolower(explode('?', $ext)[0]);
            $filename = $folder . '/' . Str::uuid() . '.' . $ext;

            Storage::disk('public')->put($filename, $contents);

            return $filename;
        } catch (\Throwable $e) {
            $this->command->warn("  ⚠ Error downloading $url: " . $e->getMessage());
            return null;
        }
    }
}
