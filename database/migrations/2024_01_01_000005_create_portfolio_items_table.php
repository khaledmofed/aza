<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('subtitle')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            // link_type: 'page' = link to portfolio detail page, 'lightbox' = fancybox lightbox, 'external' = external URL
            $table->enum('link_type', ['page', 'lightbox', 'external'])->default('lightbox');
            $table->string('external_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_item_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_images');
        Schema::dropIfExists('portfolio_items');
    }
};
