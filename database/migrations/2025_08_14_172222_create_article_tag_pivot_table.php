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
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->comment('Foreign key ke posts table');
            $table->unsignedBigInteger('tag_id')->comment('Foreign key ke article_tags table');
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('article_tags')->onDelete('cascade');
            
            // Unique constraint untuk mencegah duplikasi
            $table->unique(['post_id', 'tag_id'], 'unique_post_tag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_tag');
    }
};
