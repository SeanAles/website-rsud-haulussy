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
        Schema::table('posts', function (Blueprint $table) {
            // Add missing indexes for analytics performance
            $table->index('category_id', 'idx_posts_category_id');
            $table->index(['category_id', 'views'], 'idx_posts_categoryid_views');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop analytics indexes
            $table->dropIndex('idx_posts_category_id');
            $table->dropIndex('idx_posts_categoryid_views');
        });
    }
};
