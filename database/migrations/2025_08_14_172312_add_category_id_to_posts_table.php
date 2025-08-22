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
            // Add category_id setelah column 'category' yang sudah ada
            // NULLABLE untuk backward compatibility dan data existing
            $table->unsignedBigInteger('category_id')
                  ->nullable()
                  ->after('category')
                  ->comment('Foreign key ke article_categories table');
            
            // Foreign key constraint dengan onDelete set null untuk safety
            $table->foreign('category_id')
                  ->references('id')
                  ->on('article_categories')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['category_id']);
            
            // Then drop the column
            $table->dropColumn('category_id');
        });
    }
};
