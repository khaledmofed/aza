<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->boolean('is_featured')->default(0)->after('is_active');
        });

        // Mark the first member as featured by default
        DB::table('team_members')->orderBy('sort_order')->limit(1)->update(['is_featured' => 1]);
    }

    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
};
