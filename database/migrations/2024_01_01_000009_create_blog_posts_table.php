<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            // type: image | video | quote | carousel | audio
            $table->enum('type', ['image', 'video', 'quote', 'carousel', 'audio'])->default('image');
            $table->string('featured_image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('audio_file')->nullable();
            $table->text('quote_text')->nullable();
            $table->string('quote_author')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            // FontAwesome icon hex code for the blog-icon div (e.g. f040)
            $table->string('icon_code')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('blog_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_post_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_images');
        Schema::dropIfExists('blog_posts');
    }
};
