<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->text('details')->nullable()->after('description');
            $table->string('client')->nullable()->after('details');
            $table->string('project_date')->nullable()->after('client');
            $table->string('category')->nullable()->after('project_date');
            $table->string('website_url')->nullable()->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn(['details', 'client', 'project_date', 'category', 'website_url']);
        });
    }
};
