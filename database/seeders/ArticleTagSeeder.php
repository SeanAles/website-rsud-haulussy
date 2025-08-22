<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            // Penyakit Umum
            ['name' => 'Diabetes', 'slug' => 'diabetes'],
            ['name' => 'Hipertensi', 'slug' => 'hipertensi'], 
            ['name' => 'Jantung Koroner', 'slug' => 'jantung-koroner'],
            ['name' => 'Stroke', 'slug' => 'stroke'],
            ['name' => 'Asma', 'slug' => 'asma'],
            ['name' => 'Hepatitis', 'slug' => 'hepatitis'],
            ['name' => 'Tuberculosis', 'slug' => 'tuberculosis'],
            ['name' => 'Pneumonia', 'slug' => 'pneumonia'],
            
            // Kesehatan Anak
            ['name' => 'Imunisasi', 'slug' => 'imunisasi'],
            ['name' => 'Gizi Buruk', 'slug' => 'gizi-buruk'],
            ['name' => 'Demam Berdarah', 'slug' => 'demam-berdarah'],
            ['name' => 'Diare', 'slug' => 'diare'],
            ['name' => 'Campak', 'slug' => 'campak'],
            ['name' => 'Stunting', 'slug' => 'stunting'],
            
            // Kesehatan Ibu
            ['name' => 'Kehamilan', 'slug' => 'kehamilan'],
            ['name' => 'Persalinan', 'slug' => 'persalinan'],
            ['name' => 'ASI Eksklusif', 'slug' => 'asi-eksklusif'],
            ['name' => 'KB', 'slug' => 'kb'],
            ['name' => 'Anemia', 'slug' => 'anemia'],
            
            // Gaya Hidup Sehat
            ['name' => 'Olahraga', 'slug' => 'olahraga'],
            ['name' => 'Diet Sehat', 'slug' => 'diet-sehat'],
            ['name' => 'Stop Merokok', 'slug' => 'stop-merokok'],
            ['name' => 'Tidur Sehat', 'slug' => 'tidur-sehat'],
            ['name' => 'Stres', 'slug' => 'stres'],
            
            // Pencegahan
            ['name' => 'Vaksinasi', 'slug' => 'vaksinasi'],
            ['name' => 'Cuci Tangan', 'slug' => 'cuci-tangan'],
            ['name' => 'Protokol Kesehatan', 'slug' => 'protokol-kesehatan'],
            ['name' => 'Screening', 'slug' => 'screening'],
            
            // Teknologi Kesehatan
            ['name' => 'Telemedicine', 'slug' => 'telemedicine'],
            ['name' => 'Rekam Medis Digital', 'slug' => 'rekam-medis-digital'],
            ['name' => 'CT Scan', 'slug' => 'ct-scan'],
            ['name' => 'MRI', 'slug' => 'mri'],
            ['name' => 'USG', 'slug' => 'usg'],
            
            // Pandemi & Wabah
            ['name' => 'COVID-19', 'slug' => 'covid-19'],
            ['name' => 'Isolasi', 'slug' => 'isolasi'],
            ['name' => 'Karantina', 'slug' => 'karantina'],
            
            // Layanan RS
            ['name' => 'IGD', 'slug' => 'igd'],
            ['name' => 'ICU', 'slug' => 'icu'],
            ['name' => 'Rawat Jalan', 'slug' => 'rawat-jalan'],
            ['name' => 'Rawat Inap', 'slug' => 'rawat-inap'],
            ['name' => 'Operasi', 'slug' => 'operasi'],
            ['name' => 'Laboratorium', 'slug' => 'laboratorium'],
            ['name' => 'Radiologi', 'slug' => 'radiologi'],
            
            // Nutrisi & Suplemen
            ['name' => 'Vitamin D', 'slug' => 'vitamin-d'],
            ['name' => 'Vitamin C', 'slug' => 'vitamin-c'],
            ['name' => 'Kalsium', 'slug' => 'kalsium'],
            ['name' => 'Protein', 'slug' => 'protein'],
            ['name' => 'Serat', 'slug' => 'serat'],
            
            // Kesehatan Mental
            ['name' => 'Depresi', 'slug' => 'depresi'],
            ['name' => 'Kecemasan', 'slug' => 'kecemasan'],
            ['name' => 'Burnout', 'slug' => 'burnout'],
            ['name' => 'Self Care', 'slug' => 'self-care'],
            
            // Kategori Umum
            ['name' => 'Tips Sehat', 'slug' => 'tips-sehat'],
            ['name' => 'Pencegahan', 'slug' => 'pencegahan'],
            ['name' => 'Pengobatan', 'slug' => 'pengobatan'],
            ['name' => 'Rehabilitasi', 'slug' => 'rehabilitasi'],
        ];

        foreach ($tags as $tag) {
            DB::table('article_tags')->updateOrInsert(
                ['slug' => $tag['slug']], // Check by slug
                array_merge($tag, [
                    'usage_count' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
