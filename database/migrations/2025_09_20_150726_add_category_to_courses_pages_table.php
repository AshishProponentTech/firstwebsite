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
        Schema::table('courses_pages', function (Blueprint $table) {
            $table->enum('category', [
                'Multi-Style YTTC',
                'Kundalini YTTC',
                'Specialized YTTC',
                'Retreat',
                'Other'
            ])->default('Other')->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses_pages', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
