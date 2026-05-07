CREATE TABLE "about_images" ("id" integer primary key autoincrement not null, "image" varchar not null, "sort_order" integer not null default '0', "created_at" datetime, "updated_at" datetime);

INSERT INTO "about_images" ("id", "image", "sort_order", "created_at", "updated_at") VALUES ('4', 'about/62d74918-4958-4e70-b19f-e0b2118fd3ae.webp', '0', '2026-05-06 16:12:01', '2026-05-06 16:12:01');
INSERT INTO "about_images" ("id", "image", "sort_order", "created_at", "updated_at") VALUES ('6', 'about/04f5824e-8d8d-4a1d-a299-679aee437ccd.webp', '2', '2026-05-06 16:12:20', '2026-05-06 16:12:20');
INSERT INTO "about_images" ("id", "image", "sort_order", "created_at", "updated_at") VALUES ('7', 'about/5c39f8a0-5ea7-4322-9fb7-6959752843b0.webp', '1', '2026-05-06 18:07:28', '2026-05-06 18:07:28');

CREATE TABLE "about_sections" ("id" integer primary key autoincrement not null, "heading" varchar not null default 'THE WAY STUDIO', "subheading" varchar not null default 'ABOUT US.', "subtext" text not null, "body_text" text not null, "col1_heading" varchar not null default 'WHAT WE DO.', "col1_text" text not null, "col2_heading" varchar not null default 'WHAT WE ACHIEVE.', "col2_text" text not null, "col3_heading" varchar not null default 'AT THE END.', "col3_text" text not null, "created_at" datetime, "updated_at" datetime);

INSERT INTO "about_sections" ("id", "heading", "subheading", "subtext", "body_text", "col1_heading", "col1_text", "col2_heading", "col2_text", "col3_heading", "col3_text", "created_at", "updated_at") VALUES ('1', 'AZA ELECTROMECHANICAL', 'ABOUT US.', 'Efficiently Count on Most Advanced Technical Solutions ,

AZA Electromechanical has the representation from internationally reputed manufacturers and has a wide range of activities and interests.', 'AZA Electromechanical caters to the requirements of Industries like Smart Farms, Industries, Commercial, Engineering Industries, Construction etc. We bring quality products that exceed your expectations, and we have strategic tie-ups with the industry leaders round the globe to fulfil our customer requirements for quality products and customer services that add value to their businesses.', 'OUR VISION.', 'Through its rich resources coupled with the high quality technical and managerial staff, AZA Electromechanical Works recognizes any challenge posed by new projects regardless of the size or complexity of the project with its commitment to competitive prices and compliance to all quality standards.', 'OUR MISSION.', 'Adopting the highest standards of quality, AZA Electromechanical Works is competent to provide a wide range of services with the objective of gaining its clients satisfaction. The company undertakes the development of a special concept that would make us a leader in our field at the technological and technical levels.', 'WHY CHOOSE US.', 'With over 25 years of experience in the electromechanical sector, we combine fast delivery, quality assurance, and a creative team. Our specialists use the latest methodologies and fast-track plans to accomplish your goals with excellence.', NULL, '2026-05-06 16:29:12');

CREATE TABLE "blog_images" ("id" integer primary key autoincrement not null, "blog_post_id" integer not null, "image" varchar not null, "sort_order" integer not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("blog_post_id") references "blog_posts"("id") on delete cascade);


CREATE TABLE "blog_posts" ("id" integer primary key autoincrement not null, "title" varchar not null, "slug" varchar not null, "type" varchar check ("type" in ('image', 'video', 'quote', 'carousel', 'audio')) not null default 'image', "featured_image" varchar, "video_url" varchar, "audio_file" varchar, "quote_text" text, "quote_author" varchar, "excerpt" text, "content" text, "icon_code" varchar, "published_at" datetime, "is_published" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime);


CREATE TABLE "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));

INSERT INTO "cache" ("key", "value", "expiration") VALUES ('the-way-cache-admin@gmail.com|127.0.0.1:timer', 'i:1778148068;', '1778148068');
INSERT INTO "cache" ("key", "value", "expiration") VALUES ('the-way-cache-admin@gmail.com|127.0.0.1', 'i:1;', '1778148068');

CREATE TABLE "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));


CREATE TABLE "clients" ("id" integer primary key autoincrement not null, "name" varchar not null, "logo" varchar not null, "website" varchar, "sort_order" integer not null default '0', "is_active" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime);

INSERT INTO "clients" ("id", "name", "logo", "website", "sort_order", "is_active", "created_at", "updated_at") VALUES ('1', 'DP World', 'assets/aza/clients/dpworld.png', NULL, '1', '1', NULL, NULL);
INSERT INTO "clients" ("id", "name", "logo", "website", "sort_order", "is_active", "created_at", "updated_at") VALUES ('2', 'Fly Dubai', 'assets/aza/clients/flydubai.png', NULL, '2', '1', NULL, NULL);
INSERT INTO "clients" ("id", "name", "logo", "website", "sort_order", "is_active", "created_at", "updated_at") VALUES ('3', 'SNOC', 'assets/aza/clients/snoc.png', NULL, '3', '1', NULL, NULL);
INSERT INTO "clients" ("id", "name", "logo", "website", "sort_order", "is_active", "created_at", "updated_at") VALUES ('4', 'TECOM Group', 'assets/aza/clients/tecom.png', NULL, '4', '1', NULL, NULL);
INSERT INTO "clients" ("id", "name", "logo", "website", "sort_order", "is_active", "created_at", "updated_at") VALUES ('5', 'Al Futtaim', 'assets/aza/clients/alfuttaim.png', NULL, '5', '1', NULL, NULL);
INSERT INTO "clients" ("id", "name", "logo", "website", "sort_order", "is_active", "created_at", "updated_at") VALUES ('6', 'University of Sharjah', 'assets/aza/clients/uos.png', NULL, '6', '1', NULL, NULL);

CREATE TABLE "contact_messages" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "message" text not null, "is_read" tinyint(1) not null default '0', "created_at" datetime, "updated_at" datetime);

INSERT INTO "contact_messages" ("id", "name", "email", "message", "is_read", "created_at", "updated_at") VALUES ('1', 'khaled mofed', 'khaled.mofed1@gmail.com', 'مرحبا', '1', '2026-05-06 17:32:04', '2026-05-06 17:32:11');

CREATE TABLE "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);


CREATE TABLE "fun_facts" ("id" integer primary key autoincrement not null, "label" varchar not null, "count" integer not null default '0', "sort_order" integer not null default '0', "created_at" datetime, "updated_at" datetime);

INSERT INTO "fun_facts" ("id", "label", "count", "sort_order", "created_at", "updated_at") VALUES ('1', 'Years of Experience', '25', '1', NULL, NULL);
INSERT INTO "fun_facts" ("id", "label", "count", "sort_order", "created_at", "updated_at") VALUES ('2', 'Projects Completed', '150', '2', NULL, NULL);
INSERT INTO "fun_facts" ("id", "label", "count", "sort_order", "created_at", "updated_at") VALUES ('3', 'Happy Clients', '80', '3', NULL, NULL);
INSERT INTO "fun_facts" ("id", "label", "count", "sort_order", "created_at", "updated_at") VALUES ('4', 'Team Members', '50', '4', NULL, NULL);

CREATE TABLE "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));


CREATE TABLE "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);


CREATE TABLE "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);

INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('4', '2024_01_01_000001_create_settings_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('5', '2024_01_01_000002_create_sliders_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('6', '2024_01_01_000003_create_about_sections_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('7', '2024_01_01_000004_create_team_members_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('8', '2024_01_01_000005_create_portfolio_items_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('9', '2024_01_01_000006_create_services_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('10', '2024_01_01_000007_create_testimonials_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('11', '2024_01_01_000008_create_fun_facts_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('12', '2024_01_01_000009_create_blog_posts_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('13', '2024_01_01_000010_create_contact_messages_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('14', '2024_01_01_000011_create_pages_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('15', '2024_01_01_000012_add_is_admin_to_users_table', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('16', '2026_05_06_144156_add_image_to_services_table', '3');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('17', '2026_05_06_144156_create_clients_table', '3');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('18', '2026_05_06_175422_add_bio_to_team_members_table', '4');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('19', '2026_05_06_181910_add_info_to_portfolio_items_table', '5');

CREATE TABLE "pages" ("id" integer primary key autoincrement not null, "title" varchar not null, "slug" varchar not null, "content" text, "meta_title" varchar, "meta_description" text, "hero_image" varchar, "is_published" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime);

INSERT INTO "pages" ("id", "title", "slug", "content", "meta_title", "meta_description", "hero_image", "is_published", "created_at", "updated_at") VALUES ('1', 'About AZA Electromechanical', 'about', '<section class="aza-about-page">
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
</section>', 'About Us — AZA Electromechanical', 'Learn about AZA Electromechanical, our vision, mission, and the team behind 25+ years of excellence.', 'assets/aza/about/vision.jpg', '1', NULL, NULL);
INSERT INTO "pages" ("id", "title", "slug", "content", "meta_title", "meta_description", "hero_image", "is_published", "created_at", "updated_at") VALUES ('2', 'Our Services', 'services', '<section class="aza-services-page">
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
</section>', 'Services — AZA Electromechanical', 'Commercial, Industrial, Data Centers and Smart Farm electromechanical services by AZA.', 'assets/aza/services/industrial.jpg', '1', NULL, NULL);
INSERT INTO "pages" ("id", "title", "slug", "content", "meta_title", "meta_description", "hero_image", "is_published", "created_at", "updated_at") VALUES ('3', 'Our Projects', 'projects', '<p>Browse our portfolio of completed electromechanical projects across the UAE and the region.</p>', 'Projects — AZA Electromechanical', 'Explore AZA Electromechanical completed projects across commercial, industrial, and data center sectors.', 'assets/aza/projects/project-1.jpg', '1', NULL, NULL);
INSERT INTO "pages" ("id", "title", "slug", "content", "meta_title", "meta_description", "hero_image", "is_published", "created_at", "updated_at") VALUES ('4', 'Contact Us', 'contact', '<p>Get in touch with the AZA Electromechanical team. We are here to help with all your electromechanical needs.</p><p><strong>Phone:</strong> +971 4 339 7219</p><p><strong>Email:</strong> info@azamep.com</p><p><strong>Address:</strong> Office 503, Le Solarium Tower, Dubai Silicon Oasis, P.O Box 48466</p>', 'Contact — AZA Electromechanical', 'Contact AZA Electromechanical for your electromechanical project needs in UAE.', NULL, '1', NULL, NULL);

CREATE TABLE "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));


CREATE TABLE "portfolio_images" ("id" integer primary key autoincrement not null, "portfolio_item_id" integer not null, "image" varchar not null, "sort_order" integer not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("portfolio_item_id") references "portfolio_items"("id") on delete cascade);

INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('1', '10', 'portfolio/gallery/2ea6a13f-e27f-4796-98b7-31912ceee989.jpg', '0', '2026-05-06 19:22:07', '2026-05-06 19:22:07');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('2', '11', 'portfolio/gallery/3f48510f-b46f-4a04-9971-6c6fc474be95.jpg', '0', '2026-05-06 19:22:08', '2026-05-06 19:22:08');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('3', '11', 'portfolio/gallery/1012fa11-73e2-43ca-b486-76d83660de7c.jpg', '1', '2026-05-06 19:22:09', '2026-05-06 19:22:09');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('4', '11', 'portfolio/gallery/4856fdf9-ef6d-4d4c-b2ad-1a763cbbf155.jpg', '2', '2026-05-06 19:22:10', '2026-05-06 19:22:10');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('5', '11', 'portfolio/gallery/a06be45a-61a1-4de8-8178-3999379c623c.jpg', '3', '2026-05-06 19:22:10', '2026-05-06 19:22:10');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('6', '13', 'portfolio/gallery/431d3e75-035a-4a10-81b6-e0d44a65c329.jpg', '0', '2026-05-06 19:22:12', '2026-05-06 19:22:12');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('7', '13', 'portfolio/gallery/240c6248-9c68-4979-8142-edb1050c7efd.jpg', '1', '2026-05-06 19:22:12', '2026-05-06 19:22:12');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('8', '13', 'portfolio/gallery/6211ca31-256b-4024-8d59-cd86649a124c.jpg', '2', '2026-05-06 19:22:13', '2026-05-06 19:22:13');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('9', '13', 'portfolio/gallery/ff59b25e-4c63-4d63-b10f-c06996c3c34d.jpg', '3', '2026-05-06 19:22:13', '2026-05-06 19:22:13');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('10', '13', 'portfolio/gallery/31e4e818-e00e-4e4f-9c4d-713901debb73.jpg', '4', '2026-05-06 19:22:14', '2026-05-06 19:22:14');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('11', '14', 'portfolio/gallery/ba0953d2-3c9e-4912-a9e6-11b087446ed7.jpg', '0', '2026-05-06 19:22:15', '2026-05-06 19:22:15');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('12', '14', 'portfolio/gallery/3585f91e-2ff0-4428-ae34-a9bd4a5948c4.jpg', '1', '2026-05-06 19:22:15', '2026-05-06 19:22:15');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('13', '14', 'portfolio/gallery/b4e7a503-a049-4444-b48e-9661b4176ebd.jpg', '2', '2026-05-06 19:22:16', '2026-05-06 19:22:16');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('14', '14', 'portfolio/gallery/fd00083c-86c6-4c01-af0f-d68be146fdd5.jpg', '3', '2026-05-06 19:22:16', '2026-05-06 19:22:16');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('15', '14', 'portfolio/gallery/24616689-1e5a-45ae-9ba3-5c97459c270a.jpg', '4', '2026-05-06 19:22:16', '2026-05-06 19:22:16');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('16', '14', 'portfolio/gallery/7f562731-5afd-4893-afa1-eed112875543.jpg', '5', '2026-05-06 19:22:17', '2026-05-06 19:22:17');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('17', '15', 'portfolio/gallery/d07f8c32-64c2-46fc-bccc-72ed42199e46.jpg', '0', '2026-05-06 19:22:18', '2026-05-06 19:22:18');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('18', '15', 'portfolio/gallery/6c2f151a-ecee-4be4-80a2-f4c188f9988e.jpg', '1', '2026-05-06 19:22:19', '2026-05-06 19:22:19');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('19', '15', 'portfolio/gallery/6093758a-cb3f-4a01-963d-72cbdd0fc315.jpg', '2', '2026-05-06 19:22:20', '2026-05-06 19:22:20');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('20', '15', 'portfolio/gallery/29ea36e1-3731-4657-a26b-369044fb644a.jpg', '3', '2026-05-06 19:22:22', '2026-05-06 19:22:22');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('21', '16', 'portfolio/gallery/c19c317b-d279-4e74-8f0a-6e4a5047c131.jpeg', '0', '2026-05-06 19:22:23', '2026-05-06 19:22:23');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('22', '16', 'portfolio/gallery/5a203d7c-3e18-4572-a62b-1ef07a3a95fc.jpeg', '1', '2026-05-06 19:22:24', '2026-05-06 19:22:24');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('23', '16', 'portfolio/gallery/8df280d3-bb6f-471f-929d-9f35bb73f232.jpeg', '2', '2026-05-06 19:22:24', '2026-05-06 19:22:24');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('24', '16', 'portfolio/gallery/096ff30d-6250-4af1-83d4-3b2ff7113232.jpeg', '3', '2026-05-06 19:22:25', '2026-05-06 19:22:25');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('25', '17', 'portfolio/gallery/70593b3c-193b-42c8-91a7-68980b8d3b22.jpg', '0', '2026-05-06 19:22:26', '2026-05-06 19:22:26');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('26', '17', 'portfolio/gallery/7585084e-fe5c-47b6-96e1-4602442c8950.jpg', '1', '2026-05-06 19:22:26', '2026-05-06 19:22:26');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('27', '17', 'portfolio/gallery/f77f8d5c-4cf4-439d-aee9-70251cbeafd3.jpg', '2', '2026-05-06 19:22:27', '2026-05-06 19:22:27');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('28', '17', 'portfolio/gallery/bad6dc86-3e37-4dc8-a5ac-4ca88cfe3af2.jpg', '3', '2026-05-06 19:22:27', '2026-05-06 19:22:27');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('29', '17', 'portfolio/gallery/be42919e-909d-4f30-b3ac-c7c353d764c2.jpg', '4', '2026-05-06 19:22:28', '2026-05-06 19:22:28');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('30', '17', 'portfolio/gallery/9b0d934b-a9ea-4a8c-8470-7472c3b03a87.jpg', '5', '2026-05-06 19:22:29', '2026-05-06 19:22:29');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('31', '17', 'portfolio/gallery/67fd9715-4533-4fb3-a230-600b2b457f7c.jpg', '6', '2026-05-06 19:22:30', '2026-05-06 19:22:30');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('32', '18', 'portfolio/gallery/8cd6ec27-efa8-4311-acb5-2a32a7811520.jpeg', '0', '2026-05-06 19:22:31', '2026-05-06 19:22:31');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('33', '18', 'portfolio/gallery/081d5a47-036c-4029-afde-0733cf17d06f.jpeg', '1', '2026-05-06 19:22:31', '2026-05-06 19:22:31');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('34', '18', 'portfolio/gallery/10020bc0-d9cb-4046-bee1-aba4df88a31b.jpeg', '2', '2026-05-06 19:22:32', '2026-05-06 19:22:32');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('35', '18', 'portfolio/gallery/75a174c8-a3cb-4100-8c39-5c911e00acd0.jpeg', '3', '2026-05-06 19:22:32', '2026-05-06 19:22:32');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('36', '18', 'portfolio/gallery/8c11301b-f491-4170-bd15-f5b7368399e0.jpeg', '4', '2026-05-06 19:22:33', '2026-05-06 19:22:33');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('37', '19', 'portfolio/gallery/393d3ab9-f588-4b49-9672-ac8cb27ad789.jpeg', '0', '2026-05-06 19:22:34', '2026-05-06 19:22:34');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('38', '19', 'portfolio/gallery/62ae40f5-0d69-4265-8d2f-4d8f933905c4.jpeg', '1', '2026-05-06 19:22:35', '2026-05-06 19:22:35');
INSERT INTO "portfolio_images" ("id", "portfolio_item_id", "image", "sort_order", "created_at", "updated_at") VALUES ('39', '19', 'portfolio/gallery/3792427f-6db9-42ba-83a8-752c707f14c1.jpeg', '2', '2026-05-06 19:22:35', '2026-05-06 19:22:35');

CREATE TABLE "portfolio_items" ("id" integer primary key autoincrement not null, "title" varchar not null, "slug" varchar not null, "image" varchar not null, "subtitle" varchar, "short_description" text, "description" text, "link_type" varchar check ("link_type" in ('page', 'lightbox', 'external')) not null default 'lightbox', "external_url" varchar, "is_featured" tinyint(1) not null default '0', "is_active" tinyint(1) not null default '1', "sort_order" integer not null default '0', "created_at" datetime, "updated_at" datetime, "details" text, "client" varchar, "project_date" varchar, "category" varchar, "website_url" varchar);

INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('10', 'PROPOSED G+FUTURE MEZZANINE WORKSHOPS ON PLOT NO. W4000A & W4000B AT DMC, DUBAI', 'proposed-gfuture-mezzanine-workshops-on-plot-no-w4000a-w4000b-at-dmc-dubai', 'portfolio/9a3237d6-837a-4e3b-b036-edab87582459.jpg', NULL, NULL, 'Mechanical, electrical, and plumbing (MEP) infrastructure project encompassing design, supply, installation, testing, commissioning, and defects liability period services.', 'page', NULL, '1', '1', '0', '2026-05-06 19:22:06', '2026-05-06 19:22:06', 'DESIGN, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF MEP WORKS. Consultant: M/S YAGHMOUR. Location: Dubai.', 'M/S DP WORLD / DMC', NULL, 'Industrial / Commercial MEP Works', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('11', 'ELITE SKY WAREHOUSE BUILDINGS AT DIC', 'elite-sky-warehouse-buildings-at-dic', 'portfolio/04a38247-5f25-48ee-a273-6dce0b49e386.jpg', NULL, NULL, 'MEP design, supply, installation, testing, commissioning and defects liability period services for warehouse buildings at Dubai Industrial City.', 'page', NULL, '1', '1', '1', '2026-05-06 19:22:08', '2026-05-06 19:22:08', 'DESIGN, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF MEP WORKS. Location: Dubai Industrial City.', 'M/S TECOM INVESTMENT FZ L.L.C.', NULL, 'Industrial / Warehouse Construction', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('12', 'DMC - SUPPLY AND INSTALLATION WORKS AT SHOWROOM', 'dmc-supply-and-installation-works-at-showroom', 'portfolio/662ff64e-3b2d-4efe-ac0f-653ac0d1558f.jpg', NULL, NULL, 'Supply, installation and testing and commissioning of related MEP works & DLP of all MEP works.', 'page', NULL, '1', '1', '2', '2026-05-06 19:22:11', '2026-05-06 19:22:11', 'SUPPLY, INSTALLATION, TESTING & COMMISSIONING OF RELATED MEP WORKS & DLP. Location: Dubai.', 'M/S DP WORLD', NULL, 'MEP Works', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('13', 'TECOM - ENHANCEMENT OF BUILDING ELEVATION IN DUBAI INTERNET CITY (PHASE 1B)', 'tecom-enhancement-of-building-elevation-in-dubai-internet-city-phase-1b', 'portfolio/f79a81ee-da0d-4d18-9fb4-c3a337314cc4.jpg', NULL, NULL, 'Supply, installation, testing, commissioning of MEP works and design life cycle management of all MEP systems for building elevation enhancement.', 'page', NULL, '1', '1', '3', '2026-05-06 19:22:11', '2026-05-06 19:22:11', 'SUPPLY, INSTALLATION, TESTING & COMMISSIONING OF MEP WORKS & DESIGN LIFE CYCLE MANAGEMENT. Location: Dubai Internet City.', 'M/S TECOM INVESTMENT FZ L.L.C.', NULL, 'Commercial / MEP Construction', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('14', 'PROPOSED OFFICE (G+M) WORKSHOP & CAR/TRUCK WASHING FACILITIES AT PLOT NO. 5330394, DUBAI INDUSTRIAL CITY', 'proposed-office-gm-workshop-cartruck-washing-facilities-at-plot-no-5330394-dubai-industrial-city', 'portfolio/9836c292-cdde-43da-b7a0-1cd3bade448b.jpg', NULL, NULL, 'Supply, installation, testing, and commissioning of MEP works along with design and layout documentation of all MEP systems.', 'page', NULL, '1', '1', '4', '2026-05-06 19:22:15', '2026-05-06 19:22:15', 'SUPPLY, INSTALLATION, TESTING & COMMISSIONING OF MEP WORKS & DESIGN DOCUMENTATION. Consultant: M/S NASSA TEAM ENGINEERING CONSULTANCY. Location: Dubai Industrial City.', 'M/S IPT ENERGY POWER TRADING LLC', NULL, 'Industrial / Automotive Facilities', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('15', 'DESIGN AND BUILD OF PROPOSED WAREHOUSE AND ASSOCIATED WORKS AT PLOT NO. 3688511, AL QOUZ INDUSTRIAL 3RD', 'design-and-build-of-proposed-warehouse-and-associated-works-at-plot-no-3688511-al-qouz-industrial-3rd', 'portfolio/970ce19e-f0f8-44c7-9258-dfaaaa30df7f.jpg', NULL, NULL, 'Design, supply, installation, testing & commissioning & DLP of MEP works for warehouse and associated facilities.', 'page', NULL, '1', '1', '5', '2026-05-06 19:22:18', '2026-05-06 19:22:18', 'DESIGN, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF MEP WORKS. Consultant: M/S ZNERA SPACE LAB-FZ CONSULTANT. Location: Al Qouz Industrial 3rd, Dubai.', 'M/S A & M INVESTMENT L.L.C.', NULL, 'Industrial / Warehouse Construction', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('16', 'PROPOSED WAREHOUSE (G+M) & 4 SERVICE BLOCK — SHARJAH RESEARCH TECHNOLOGY AND INNOVATION PARK', 'proposed-warehouse-gm-4-service-block-sharjah-research-technology-and-innovation-park', 'portfolio/492c7311-adcf-4854-afa8-e44186de4314.jpeg', NULL, NULL, 'Design verification, supply, installation, testing, commissioning & DLP of all MEP works for warehouse and service block facilities.', 'page', NULL, '1', '1', '6', '2026-05-06 19:22:22', '2026-05-06 19:22:22', 'DESIGN VERIFICATION, SUPPLY, INSTALLATION, TESTING, COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S ATRIUM ARCHITECTURAL & ENGINEERING CONSULTANCY. Location: Sharjah.', 'M/S SHARJAH RESEARCH TECHNOLOGY AND INNOVATION PARK', NULL, 'Industrial / Warehouse Construction', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('17', 'DESIGN & REFURBISHMENT OF AL FUTTAIM TOYOTA FACILITY LOCATED E 11', 'design-refurbishment-of-al-futtaim-toyota-facility-located-e-11', 'portfolio/4a01847b-c199-4d64-8887-dd82cf2607d6.jpg', NULL, NULL, 'Design modification, supply, installation, testing, commissioning, and DLP of all MEP works for a Toyota facility refurbishment project.', 'page', NULL, '1', '1', '7', '2026-05-06 19:22:25', '2026-05-06 19:22:25', 'DESIGN MODIFICATION, SUPPLY, INSTALLATION, TESTING & COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S CAPITAL ENGINEERING CONSULTANCY. Location: Ras Al Khaimah.', 'M/S AL-FUTTAIM AUTO GROUP REAL ESTATE', NULL, 'Commercial / Automotive Facility', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('18', 'CITY CENTER ZAHIA TIER 2 AUTO CENTER', 'city-center-zahia-tier-2-auto-center', 'portfolio/705dfbce-8068-4086-baa1-51fb3e84d1f5.jpeg', NULL, NULL, 'Design verification, supply, installation, testing, commissioning and defects liability period management of all MEP systems.', 'page', NULL, '1', '1', '8', '2026-05-06 19:22:30', '2026-05-06 19:22:30', 'DESIGN VERIFICATION, SUPPLY, INSTALLATION, TESTING, COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S CAPITAL ENGINEERING CONSULTANCY. Location: Sharjah.', 'M/S AL-FUTTAIM AUTO CENTERS AUTOEQUIP', NULL, 'Commercial / Auto Center', NULL);
INSERT INTO "portfolio_items" ("id", "title", "slug", "image", "subtitle", "short_description", "description", "link_type", "external_url", "is_featured", "is_active", "sort_order", "created_at", "updated_at", "details", "client", "project_date", "category", "website_url") VALUES ('19', 'CITY CENTRE MIRDIF TIER 2 AUTO CENTER', 'city-centre-mirdif-tier-2-auto-center', 'portfolio/d5cd5fde-31db-4557-9de6-d535773e8803.jpeg', NULL, NULL, 'Design verification, supply, installation, testing, commissioning & DLP of all MEP works for auto center facilities.', 'page', NULL, '1', '1', '9', '2026-05-06 19:22:34', '2026-05-06 19:22:34', 'DESIGN VERIFICATION, SUPPLY, INSTALLATION, TESTING, COMMISSIONING & DLP OF ALL MEP WORKS. Consultant: M/S CAPITAL ENGINEERING CONSULTANCY. Location: Mirdif, Dubai.', 'M/S AL FUTTAIM AUTO CENTERS AUTOEQUIP', NULL, 'Commercial / Auto Center', NULL);

CREATE TABLE "services" ("id" integer primary key autoincrement not null, "title" varchar not null, "description" text not null, "icon_image" varchar, "sort_order" integer not null default '0', "is_active" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime, "image" varchar);

INSERT INTO "services" ("id", "title", "description", "icon_image", "sort_order", "is_active", "created_at", "updated_at", "image") VALUES ('1', 'Commercial', 'Offices, Showroom, Car Parking, Labour Camps, Shopping Centers — we deliver complete electromechanical solutions for all commercial sectors.', 'services/88d574ef-4e37-4f87-ba44-6d5fc025300d.webp', '1', '1', NULL, '2026-05-06 20:18:39', 'assets/aza/services/commercial.jpg');
INSERT INTO "services" ("id", "title", "description", "icon_image", "sort_order", "is_active", "created_at", "updated_at", "image") VALUES ('2', 'Industrials', 'Factories, Cold Stores, Workshops, Warehouses, Logistics — industrial-grade electromechanical systems built for maximum efficiency.', 'services/145846bb-c157-45fa-9fdd-e7ab74557a16.webp', '2', '1', NULL, '2026-05-06 20:18:53', 'assets/aza/services/industrial.jpg');
INSERT INTO "services" ("id", "title", "description", "icon_image", "sort_order", "is_active", "created_at", "updated_at", "image") VALUES ('3', 'Data Centers', 'We support the center hardware requirements including HV, LV power systems, uninterruptible power supplies (UPS) and complete cooling solutions.', 'services/c725847f-84bf-4e31-9719-0bf6aa43dad7.webp', '3', '1', NULL, '2026-05-06 20:19:32', 'assets/aza/services/data-center.jpg');
INSERT INTO "services" ("id", "title", "description", "icon_image", "sort_order", "is_active", "created_at", "updated_at", "image") VALUES ('4', 'Smart Farms', 'This approach gives farmers tools and strategies to improve yields and sustainability of agricultural operations through smart electromechanical systems.', 'services/77f3c628-171f-46c2-8230-f5ee9dc5e1a4.webp', '4', '1', NULL, '2026-05-06 20:19:22', 'assets/aza/services/smart-farms.jpg');

CREATE TABLE "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));

INSERT INTO "sessions" ("id", "user_id", "ip_address", "user_agent", "payload", "last_activity") VALUES ('1yNiz6s7QCEV084vhX8qVT50X1KJ3mLACtoYEhnO', '1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU3BVSnk4S3A5YzJUcnlYUEhza1JSb21ZbFpkR3lYWGhvYlBXTUVnVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', '1778101754');
INSERT INTO "sessions" ("id", "user_id", "ip_address", "user_agent", "payload", "last_activity") VALUES ('XcflSdszp6YGg83MaoNtOwjQhWZhk8imcETcnK8T', '1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieE43bUZFS1M1Zm9ncnZPNFRrUXpUaDE3VXNMd1ZMWUw0QzdkMFRycSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', '1778148139');

CREATE TABLE "settings" ("id" integer primary key autoincrement not null, "key" varchar not null, "value" text, "created_at" datetime, "updated_at" datetime);

INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('1', 'site_name', 'AZA Electromechanical', '2026-05-02 14:58:44', '2026-05-02 14:58:44');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('2', 'site_email', 'info@azamep.com', '2026-05-02 14:58:44', '2026-05-02 14:58:44');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('3', 'site_phone', '+971 4 339 7219', '2026-05-02 14:58:44', '2026-05-02 14:58:44');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('4', 'site_address', 'Office 503, Le Solarium Tower, Dubai Silicon Oasis, P.O Box 48466', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('5', 'site_website', 'https://azamep.com/', '2026-05-02 14:58:45', '2026-05-06 14:58:55');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('6', 'footer_copyright', 'Copyright © 2024 AZA Electromechanical. All Rights Reserved.', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('7', 'quote_text', 'Adopting the highest standards of quality, AZA Electromechanical Works is competent to provide a wide range of services with the objective of gaining its clients satisfaction.', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('8', 'quote_author', 'Eng. Zeyad Al Shammary — Managing Director', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('9', 'cta_text', 'Contact us today and let our expert team handle your electromechanical needs.', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('10', 'facts_heading', 'SOME FUN FACTS', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('11', 'social_twitter', 'https://twitter.com/', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('12', 'social_facebook', 'https://www.facebook.com/', '2026-05-02 14:58:45', '2026-05-02 14:58:45');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('13', 'social_github', NULL, '2026-05-02 14:58:45', '2026-05-06 14:58:55');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('14', 'social_googleplus', NULL, '2026-05-02 14:58:45', '2026-05-06 14:58:55');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('16', 'site_tagline', 'Modern State of the Art Solutions', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('20', 'logo', 'assets/aza/logo.jpg', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('21', 'logo_white', 'assets/aza/logo-white.png', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('22', 'social_linkedin', 'https://www.linkedin.com/', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('25', 'hero_title_1', 'AZA Modern State of the Art Solutions', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('26', 'hero_title_2', 'We Create Mega Structures For Better Future', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('27', 'hero_title_3', 'Combining Transparency And Structural Integrity', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('28', 'about_title', 'Efficiently Count on Most Advanced Technical', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('29', 'about_text', 'AZA Electromechanical has the representation from internationally reputed manufacturers and has a wide range of activities and interests. AZA Electromechanical caters to the requirements of Industries like Smart Farms, Industries, Commercial, Engineering Industries, Construction etc. We bring quality products that exceed your expectations, and we have strategic tie-ups with the industry leaders round the globe.', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('30', 'stats_experience', '25+', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('31', 'footer_text', 'We work with a passion of taking challenges and creating new ones in the electromechanical sector.', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('32', 'cta_title', 'Ready to Start Your Project?', NULL, NULL);
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('36', 'site_logo', 'settings/0b0cd6c2-c3e1-4897-bccf-63b16a2eb296.webp', NULL, '2026-05-06 15:30:53');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('39', 'parallax2_image', 'settings/0f494961-825b-428c-bffe-d061a564e8fb.webp', '2026-05-06 17:17:08', '2026-05-06 18:11:26');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('40', 'parallax3_image', 'settings/4d2ba362-9760-453c-bcd4-eb4271acc603.webp', '2026-05-06 17:19:00', '2026-05-06 18:11:26');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('41', 'parallax1_image', 'settings/1a9555d3-0917-4260-8b92-dff7a123ac14.webp', '2026-05-06 17:19:08', '2026-05-06 17:19:08');
INSERT INTO "settings" ("id", "key", "value", "created_at", "updated_at") VALUES ('42', 'parallax4_image', 'settings/53624b8d-9922-40f6-922f-7d74581b7c78.webp', '2026-05-06 20:53:29', '2026-05-06 20:53:50');

CREATE TABLE "sliders" ("id" integer primary key autoincrement not null, "image" varchar not null, "subtitle" varchar, "title" varchar, "title_highlight" varchar, "transition" varchar not null default 'papercut', "sort_order" integer not null default '0', "is_active" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime);

INSERT INTO "sliders" ("id", "image", "subtitle", "title", "title_highlight", "transition", "sort_order", "is_active", "created_at", "updated_at") VALUES ('1', 'sliders/2a4d3a58-fe42-4608-a15d-7e053eb844f3.webp', 'AZA Electromechanical', 'Modern', 'Solutions', 'papercut', '1', '1', NULL, '2026-05-06 15:53:06');
INSERT INTO "sliders" ("id", "image", "subtitle", "title", "title_highlight", "transition", "sort_order", "is_active", "created_at", "updated_at") VALUES ('2', 'sliders/14d2d864-0baf-4191-a071-0044d195ed4e.webp', 'Building Excellence', 'Building a Better', 'Future', 'papercut', '2', '1', NULL, '2026-05-06 15:54:00');
INSERT INTO "sliders" ("id", "image", "subtitle", "title", "title_highlight", "transition", "sort_order", "is_active", "created_at", "updated_at") VALUES ('3', 'sliders/b203166e-4d21-4bcb-920d-6451d74fcaf3.webp', 'Quality & Integrity', 'Transparency &', 'Integrity', 'papercut', '3', '1', NULL, '2026-05-06 15:55:05');

CREATE TABLE "team_members" ("id" integer primary key autoincrement not null, "name" varchar not null, "position" varchar not null, "photo" varchar not null, "twitter" varchar, "facebook" varchar, "github" varchar, "googleplus" varchar, "email" varchar, "sort_order" integer not null default '0', "is_active" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime, "bio" text);

INSERT INTO "team_members" ("id", "name", "position", "photo", "twitter", "facebook", "github", "googleplus", "email", "sort_order", "is_active", "created_at", "updated_at", "bio") VALUES ('1', 'Eng. Zeyad Al Shammary', 'Managing Director', 'team/16b38ca6-feee-461e-b60c-a0e54664ce27.webp', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2026-05-06 17:57:55', 'Visionary executive with +25 years of proven success in spearheading leading companies dealing with complex Electromechanical systems. Adept At fostering collaborative environments, navigating strategic partnerships, and translating cutting-edge technologies into tangible solutions. Passionate about building high-performing teams and propelling organizational growth through impactful leadership. From the intricate world of Electromechanical systems to the cutting-edge frontiers. Engineer Zeyad Al Shammary has consistently navigated complex landscapes with strategic brilliance and unweaving resolve. His expertise transcends mere technical prowess; it embodies an intuitive understanding of the dynamic interplay between technology, threat assessment, and strategic planning. Executive Management, Sales and Business Development coupled with strong technical and regional experience. Dynamic and result oriented with roles that involve spearheading and championing my own vision in exploiting all possible business opportunities in the high-tech industry. A proven track-record in the Electromechanical systems and executive management area. In depth knowledge of the latest Intelligent Integrated Electromechanical Systems. Excellent interpersonal skills, business communication, strong influencing and leadership skills coupled with a hands-on approach. A proven track-record leading a team of high-caliber enterprise sales professionals. Problem solver with the ability to deal with a variety of complex issues and to work under pressure in a changing environment. Ability to provide leadership and communicate effectively.');

CREATE TABLE "testimonials" ("id" integer primary key autoincrement not null, "content" text not null, "author" varchar not null, "company" varchar, "sort_order" integer not null default '0', "is_active" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime);

INSERT INTO "testimonials" ("id", "content", "author", "company", "sort_order", "is_active", "created_at", "updated_at") VALUES ('1', 'AZA Electromechanical delivered our data center project on time and to the highest quality standards. Their team is professional and highly skilled.', 'Ahmed Al Mansouri', 'DP World', '1', '1', NULL, NULL);
INSERT INTO "testimonials" ("id", "content", "author", "company", "sort_order", "is_active", "created_at", "updated_at") VALUES ('2', 'Excellent service and outstanding professionalism throughout our smart farm project. We highly recommend AZA for any electromechanical work.', 'Sarah Johnson', 'TECOM Group', '2', '1', NULL, NULL);
INSERT INTO "testimonials" ("id", "content", "author", "company", "sort_order", "is_active", "created_at", "updated_at") VALUES ('3', 'The team at AZA exceeded our expectations. Their attention to detail and commitment to quality is second to none in the industry.', 'Mohammed Al Rashidi', 'SNOC', '3', '1', NULL, NULL);

CREATE TABLE "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime, "is_admin" tinyint(1) not null default '0');

INSERT INTO "users" ("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at", "is_admin") VALUES ('1', 'Admin', 'admin@theway.com', NULL, '$2y$12$liLJsupTWDEmTcDXXvvzsOMGVMQU73dzRrHaSXoiOvjEdOPrbJHiK', NULL, '2026-05-02 14:58:44', '2026-05-02 14:58:44', '1');

