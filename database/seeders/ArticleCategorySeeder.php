<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Info Umum',
                'slug' => 'info-umum',
                'description' => 'Informasi umum terkait layanan dan kegiatan RSUD Dr. M. Haulussy',
                'color' => '#6c757d',
                'icon' => 'fas fa-info-circle',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Berita Rumah Sakit',
                'slug' => 'berita-rumah-sakit',
                'description' => 'Berita terkini dari RSUD Dr. M. Haulussy Ambon',
                'color' => '#007bff',
                'icon' => 'fas fa-newspaper',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Kesehatan Jantung',
                'slug' => 'kesehatan-jantung',
                'description' => 'Artikel tentang kesehatan jantung dan kardiovaskular',
                'color' => '#dc3545',
                'icon' => 'fas fa-heartbeat',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Gizi dan Nutrisi',
                'slug' => 'gizi-dan-nutrisi',
                'description' => 'Tips dan informasi seputar gizi seimbang dan nutrisi',
                'color' => '#28a745',
                'icon' => 'fas fa-apple-alt',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Kesehatan Mental',
                'slug' => 'kesehatan-mental',
                'description' => 'Artikel tentang kesehatan mental dan psikologi',
                'color' => '#17a2b8',
                'icon' => 'fas fa-brain',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Kesehatan Anak',
                'slug' => 'kesehatan-anak',
                'description' => 'Informasi kesehatan khusus untuk anak-anak dan balita',
                'color' => '#fd7e14',
                'icon' => 'fas fa-child',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Kesehatan Ibu',
                'slug' => 'kesehatan-ibu',
                'description' => 'Artikel seputar kesehatan ibu hamil, melahirkan, dan menyusui',
                'color' => '#e83e8c',
                'icon' => 'fas fa-female',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Pencegahan Penyakit',
                'slug' => 'pencegahan-penyakit',
                'description' => 'Tips pencegahan berbagai macam penyakit',
                'color' => '#ffc107',
                'icon' => 'fas fa-shield-alt',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Layanan Medis',
                'slug' => 'layanan-medis',
                'description' => 'Informasi tentang layanan medis yang tersedia di rumah sakit',
                'color' => '#6610f2',
                'icon' => 'fas fa-stethoscope',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Teknologi Kesehatan',
                'slug' => 'teknologi-kesehatan',
                'description' => 'Artikel tentang inovasi dan teknologi terbaru dalam dunia kesehatan',
                'color' => '#20c997',
                'icon' => 'fas fa-microscope',
                'is_active' => true,
                'sort_order' => 10,
            ]
        ];

        foreach ($categories as $category) {
            DB::table('article_categories')->updateOrInsert(
                ['slug' => $category['slug']], // Check by slug
                array_merge($category, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
