<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('THE WAY STUDIO');
            $table->string('subheading')->default('ABOUT US.');
            $table->text('subtext');
            $table->text('body_text');
            $table->string('col1_heading')->default('WHAT WE DO.');
            $table->text('col1_text');
            $table->string('col2_heading')->default('WHAT WE ACHIEVE.');
            $table->text('col2_text');
            $table->string('col3_heading')->default('AT THE END.');
            $table->text('col3_text');
            $table->timestamps();
        });

        Schema::create('about_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_images');
        Schema::dropIfExists('about_sections');
    }
};
