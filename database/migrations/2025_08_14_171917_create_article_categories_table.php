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
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama kategori artikel');
            $table->string('slug')->unique()->comment('URL friendly slug');
            $table->text('description')->nullable()->comment('Deskripsi kategori');
            $table->string('color', 7)->default('#6c757d')->comment('Warna hex untuk UI');
            $table->string('icon', 50)->default('fas fa-folder')->comment('FontAwesome icon class');
            $table->boolean('is_active')->default(true)->comment('Status aktif kategori');
            $table->integer('sort_order')->default(0)->comment('Urutan tampilan kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_categories');
    }
};
