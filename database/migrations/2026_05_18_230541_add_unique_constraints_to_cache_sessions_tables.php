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
        // PostgreSQL requires UNIQUE constraints for upsert ON CONFLICT to work
        $this->addUniqueIfMissing('cache',       'key',  'cache_key_unique');
        $this->addUniqueIfMissing('cache_locks', 'key',  'cache_locks_key_unique');
        $this->addUniqueIfMissing('sessions',    'id',   'sessions_id_unique');
    }

    public function down(): void
    {
        Schema::table('cache',       fn($t) => $t->dropUnique('cache_key_unique'));
        Schema::table('cache_locks', fn($t) => $t->dropUnique('cache_locks_key_unique'));
        Schema::table('sessions',    fn($t) => $t->dropUnique('sessions_id_unique'));
    }

    private function addUniqueIfMissing(string $table, string $col, string $name): void
    {
        try {
            $exists = \DB::select(
                "SELECT 1 FROM pg_constraint WHERE conname = ? AND contype = 'u'",
                [$name]
            );
            if (empty($exists)) {
                Schema::table($table, fn($t) => $t->unique($col, $name));
            }
        } catch (\Throwable) {
            // SQLite or other drivers — skip
        }
    }
};
